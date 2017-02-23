---
author: admin
comments: true
date: 2017-02-23 17:00:00+00:00
layout: post
slug: windows_forms_on_osx_clipboard_not_working
title: 'Windows Forms on OSX - Clipboard not working'
categories:
- Coding
- Programmierung
tags:
- Csharp
- OSX
- Winforms

---
You can run Winforms applications on OSX by using Mono. Its looking sort of ugly, but most stuff works out of box. However there are some bugs, which make the usage of the application an annoyance. For example the clipboard is not working as expected. Copy and paste works in the application itself, but if you copy anything from another application on OSX. This means, that the application has its own clipboard. Setting the clipboard with <code>Clipboard.SetText("schlurps")</code> only sets the application internal clipboard.

This is a known issue (see [here](https://bugzilla.xamarin.com/show_bug.cgi?id=3106)) and looking to the reported dates, I would not expect any 

## The workaround

On Stackoverflow is a [proposed and working solution](http://stackoverflow.com/questions/28611112/mono-clipboard-fix) to copy data from the OSX clipboard and also retrieve data from it. It uses the <code>pbcopy</code> command for that.

While that works this is manual action. You can access the clipboard, but you cannot just paste from OSX. I made a workaround which involves a timer. The timer checks every 250ms if the content of the Mac-Clipboard has been changed. In that case the application clipboard is set. 

Here is the class:

    public class MacClipboard
    {
        private static String _osxClipboard = "";

        private static Timer _timer = new Timer();

        public static string OsxClipboard
        {
            get
            {
                return _osxClipboard;
            }

            set
            {
                _osxClipboard = value;
            }
        }
        
        public static void Init()
        {
            _timer.Interval = 250;
            _timer.Enabled = true;
            _timer.Tick += Timer_Tick;
        }

        private static void Timer_Tick(object sender, EventArgs e)
        {
            UpdateClipboard();
        }

        public static void UpdateClipboard()
        {
            String s = Paste();

            if (_osxClipboard != s)
            {
                _osxClipboard = s;
                Clipboard.SetText(s);
            }
        }


        /// <summary>
        /// Copy on MAC OS X using pbcopy commandline
        /// </summary>
        /// <param name="textToCopy"></param>
        public static void Copy(string textToCopy)
        {
            try
            {
                using (var p = new Process())
                {

                    p.StartInfo = new ProcessStartInfo("pbcopy", "-pboard general -Prefer txt");
                    p.StartInfo.UseShellExecute = false;
                    p.StartInfo.RedirectStandardOutput = false;
                    p.StartInfo.RedirectStandardInput = true;
                    p.Start();
                    p.StandardInput.Write(textToCopy);
                    p.StandardInput.Close();
                    p.WaitForExit();
                }
            }
            catch (Exception ex)
            {
                Trace.WriteLine(ex.Message);
            }


        }

        /// <summary>
        /// Paste on MAC OS X using pbpaste commandline
        /// </summary>
        /// <returns></returns>
        public static string Paste()
        {
            try
            {
                string pasteText;
                using (var p = new Process())
                {

                    p.StartInfo = new ProcessStartInfo("pbpaste", "-pboard general");
                    p.StartInfo.UseShellExecute = false;
                    p.StartInfo.RedirectStandardOutput = true;
                    p.Start();
                    pasteText = p.StandardOutput.ReadToEnd();
                    p.WaitForExit();
                }

                return pasteText;
            }
            catch (Exception ex)
            {
                Trace.WriteLine(ex.Message);
                return null;
            }

        }
    }


I am only starting the timer on OSX in my application. If the user copies something into the clipboard it will be made available in the application clipboard. You can also set or the OSX clipboard manually. It should also be easy to extend the code for the other way around. If the application clipboard changes, the content could be copied back to the OSX clipboard.

Its not a very good implementation, but it works.