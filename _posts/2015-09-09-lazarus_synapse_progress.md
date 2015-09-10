---
author: admin
comments: true
date: 2015-09-09 17:00:00+00:00
layout: post
slug: lazarus_synapse_progress
title: 'Download with progress using Lazarus and Synapse'
categories:
- Lazarus
- Delphi
tags:
- Synapse

---

# Download with progress using Lazarus and Synapse

The Synapse library provides a lot of TCP/IP functions for use in Delphi and Lazarus. 

![](/assets/uploads/2015/9/laz1.jpg)

I needed to download something from a HTTP server. The [basic download](http://wiki.freepascal.org/Synapse) is very simple: 

	HTTPGetResult := HTTPSender.HTTPMethod('GET', URL);
	if (HTTPSender.ResultCode >= 100) and (HTTPSender.ResultCode<=299) then begin
	   HTTPSender.Document.SaveToFile(TargetFile);

While this code works, it is blocking and there is no information on the progress, nor any information how big the file is, which is downloaded.

So I started by implementing a class around the download function:

	type
	  { THttpDownloader }
	
	  THttpDownloader = class
	  public
	    function DownloadHTTP(URL, TargetFile: string; ProgressMonitor : IProgress): Boolean;
	  private
	    Bytes : Integer;
	    MaxBytes : Integer;
	    HTTPSender: THTTPSend;
	    ProgressMonitor : IProgress;
	    procedure Status(Sender: TObject; Reason: THookSocketReason; const Value: String);
	    function GetSizeFromHeader(Header: String):integer;
	  end; 

I also defined an interface to get the UI notified about the progress:

	type
	  IProgress = interface
	    procedure ProgressNotification(Text: String; CurrentProgress : integer; MaxProgress : integer);
	  end;  

The download code from above moves to the "DownloadHTTP" function:

	function THttpDownloader.DownloadHTTP(URL, TargetFile: string; ProgressMonitor : IProgress): Boolean;
	var
	  HTTPGetResult: Boolean;
	begin
	  Result := False;
	  Bytes:= 0;
	  MaxBytes:= -1;
	  Self.ProgressMonitor:= ProgressMonitor;
	
	  HTTPSender := THTTPSend.Create;
	  try
	    HTTPSender.Sock.OnStatus:= Status;
	    HTTPGetResult := HTTPSender.HTTPMethod('GET', URL);
	    if (HTTPSender.ResultCode >= 100) and (HTTPSender.ResultCode<=299) then begin
	      HTTPSender.Document.SaveToFile(TargetFile);
	      Result := True;
	    end;
	  finally
	    HTTPSender.Free;
	  end;
	end;

To get updates on the progress we need to implement a callback function, which we assign in the line <code>HTTPSender.Sock.OnStatus:= Status;</code>.

This function looks like that:

	procedure THttpDownloader.Status(Sender: TObject; Reason: THookSocketReason; const Value: String);
	var
	  V, currentHeader: String;
	  i: integer;
	begin
	  //try to get filesize from headers
	  if (MaxBytes = -1) then
	  begin
	    for i:= 0 to HTTPSender.Headers.Count - 1 do
	    begin
	      currentHeader:= HTTPSender.Headers[i];
	      MaxBytes:= GetSizeFromHeader(currentHeader);
	      if MaxBytes <> -1 then break;
	    end;
	  end;
	
	  V := GetEnumName(TypeInfo(THookSocketReason), Integer(Reason)) + ' ' + Value;
	
	  if Reason = THookSocketReason.HR_ReadCount then
	  begin
	    Bytes:= Bytes + StrToInt(Value);
	    ProgressMonitor.ProgressNotification(V, Bytes, MaxBytes);
	  end;
	end;   
	
	function THttpDownloader.GetSizeFromHeader(Header: String): integer;
	var
	  item : TStringList;
	begin
	  Result:= -1;
	
	  if Pos('Content-Length:', Header) <> 0 then
	  begin
	    item:= TStringList.Create();
	    item.Delimiter:= ':';
	    item.StrictDelimiter:=true;
	    item.DelimitedText:=Header;
	    if item.Count = 2 then
	    begin
	      Result:= StrToInt(Trim(item[1]));
	    end;
	  end;
	end;     
	         
What are we doing here? 

First of all we look into the headers to get the file size. We have to wait and check if the header is there. The first events do not contain the <code>Content-Length:</code> information. 

Once found, we extract that information. There are several events popping up here, which you can react to. But we only check for <code>THookSocketReason.HR_ReadCount</code> in that example. 

"HR_ReadCount" provides us with the information how many bytes where read since the last event. 

The progress is then reported to the UI:

	procedure TMainForm.ProgressNotification(Text: String; CurrentProgress: integer; MaxProgress: integer);
	begin
	  if (MaxProgress <> -1) then ProgressBar.Max:= MaxProgress;
	  ProgressBar.Position:= CurrentProgress;
	  memoStatus.Lines.Add(Text);
	  Application.ProcessMessages;
	end;

Well thats it! The complete source code can be [downloaded here](/assets/uploads/2015/9/laz_downloader.zip).