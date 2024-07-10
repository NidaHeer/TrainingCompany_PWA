function Download() {
        var x = document.getElementById('download');
        // document.getElementById('assignment').style.display = 'none';
        //document.getElementById('live_class').style.display = 'none';
        if (x.style.display === 'block') {
          x.style.display = 'none';
        } else {
          x.style.display = 'block';
        }
      }
      function Assignment() {
        var x = document.getElementById('assignment');
        document.getElementById('download').style.display = 'none';
        document.getElementById('lecture').style.display = 'none';
        document.getElementById('live_class').style.display = 'none';
        if (x.style.display === 'block') {
          x.style.display = 'none';
        } else {
          x.style.display = 'block';
        }
      }
      function Lectures() {
        var x = document.getElementById('lecture');
        // document.getElementById('assignment').style.display = 'none';
        document.getElementById('live_class').style.display = 'none';
        if (x.style.display === 'block') {
          x.style.display = 'none';
        } else {
          x.style.display = 'block';
        }
      }

      function LiveClass() {
        console.log("LiveCLass called");
        var x = document.getElementById('live_class');
        //document.getElementById('assignment').style.display = 'none';
        document.getElementById('lecture').style.display = 'none';
        document.getElementById('download').style.display = 'none';
        if (x.style.display === 'block') {
          x.style.display = 'none';
        } else {
          x.style.display = 'block';
        }
      }
      function OpenWindow(url)
          {
            var win = window.open(url, 'Notice', 'width=550,height=500,toolbar=no,resizable=1,top=100,left=250,scrollbars=1');
            win.focus();
          }

         