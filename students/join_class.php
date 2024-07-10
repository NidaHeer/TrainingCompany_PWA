<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Online Tution Poral | Live Class </title>
  <link rel="icon" href="../assets/images/logo.jpeg"/>
  <script>
  var script = document.createElement("script");
  script.type = "text/javascript";

console.log("bjb ");
  script.addEventListener("load", function (event) {
    const config = {
      name: "Student",
      meetingId: "milkyway",
      apiKey: "c6168bcc-0364-4a9a-892c-bd82957a4f57",

      containerId: null,

      micEnabled: true,
      webcamEnabled: true,
      participantCanToggleSelfWebcam: true,
      participantCanToggleSelfMic: true,

      chatEnabled: true,
      screenShareEnabled: true,

      // brandingEnabled: true,
      // brandLogoURL: "images/logo.jpeg",
      // brandName: "Online Tution Point",
       brandingEnabled: true,
      brandLogoURL: "https://picsum.photos/200",
      brandName: "Awesome startup",
      poweredBy: true,



      permissions: {
        askToJoin: true, // Ask joined participants for entry in meeting
        toggleParticipantMic: false, // Can toggle other participant's mic
        toggleParticipantWebcam: false, // Can toggle other participant's webcam
        drawOnWhiteboard: true, // Can draw on whiteboard
        toggleWhiteboard: true, // Can toggle whiteboard
        toggleRecording: false, // Can toggle meeting recording
        removeParticipant: false, // Can remove participant
        endMeeting: false, // Can end meeting
      },

      joinScreen: {
        visible: true, // Show the join screen ?
        title: "Daily scrum", // Meeting title
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
    "https://sdk.videosdk.live/rtc-js-prebuilt/0.3.3/rtc-js-prebuilt.js";
  document.getElementsByTagName("head")[0].appendChild(script);
</script>
</head>
<body>

</body>
</html>