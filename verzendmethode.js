

        // an XMLHttpRequest
        var xhr = null;

        /*
         * void
         * quote()
         *
         * Gets a quote.
         */
        function quote()
        {
            // instantiate XMLHttpRequest object
            try
            {
                xhr = new XMLHttpRequest();
            }
            catch (e)
            {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }

            // handle old browsers
            if (xhr == null)
            {
                alert("Ajax not supported by your browser!");
                return;
            }

            // construct URL
            var url = "winkelwagen.php";

            // get quote
            xhr.onreadystatechange = handler;
            xhr.open("POST", url, true);
            xmlhttp.setRequestHeader("Content-type",
"application/x-www-form-urlencoded");
            xhr.send("verzending=" + document.getElementById("verzending").value");
        }


        /*
         * void
         * handler()
         *
         * Handles the Ajax response.
         */
        function handler()
        {
            // only handle loaded requests
            if (xhr.readyState == 4)
            {
                if (xhr.status == 200)
                    document.getElementById("price").innerHTML = xhr.responseText;
                else
                    alert("Error with Ajax call!");
            }
        }
