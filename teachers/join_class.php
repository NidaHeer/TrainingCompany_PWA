<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>LMS | Live Class </title>
  <link rel="icon" href="../assets/images/logo.jpeg"/>
  <script>
  var script = document.createElement("script");
  script.type = "text/javascript";

  script.addEventListener("load", function (event) {
    const config = {
      name: "Admin",
      meetingId: "milkyway",
      apiKey: "cbb88066-ee2b-42cd-bf3f-b968113c7d67",

      containerId: null,

      micEnabled: true,
      webcamEnabled: true,
      participantCanToggleSelfWebcam: true,
      participantCanToggleSelfMic: true,

      chatEnabled: true,
      screenShareEnabled: true,

      brandingEnabled: true,
      brandLogoURL: "images/logo.jpeg",
      brandName: "LMS",

      permissions: {
        askToJoin: false, // Ask joined participants for entry in meeting
        toggleParticipantMic: true, // Can toggle other participant's mic
        toggleParticipantWebcam: true, // Can toggle other participant's webcam
        drawOnWhiteboard: true, // Can draw on whiteboard
        toggleWhiteboard: true, // Can toggle whiteboard
        toggleRecording: true, // Can toggle meeting recording
        removeParticipant: true, // Can remove participant
        endMeeting: true, // Can end meeting
      },

      joinScreen: {
        visible: true, // Show the join screen ?
        title: "Live Class", // Meeting title
        meetingUrl: window.location.href, // Meeting joining url
      },

      pin: {
        allowed: true, // participant can pin any participant in meeting
        layout: "SPOTLIGHT", // meeting layout - GRID | SPOTLIGHT | SIDEBAR
      },

       notificationSoundEnabled: true,

      maxResolution: "sd", // "hd" or "sd"

      /*

     Other Feature Properties
      
      */
    };

    const meeting = new VideoSDKMeeting();
    meeting.init(config);
  });

  script.src =
        "https://sdk.videosdk.live/rtc-js-prebuilt/0.3.38/rtc-js-prebuilt.js";
      document.getElementsByTagName("head")[0].appendChild(script);
</script>
</head>
<body>

</body>
</html>

