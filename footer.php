<footer>
            <p class="p">"Online movies" the best free online movies website. </p>
            <address style="color:rgb(198, 198, 198);"> Owners: Arif Berisha, Albert Grajçevci and Alban Murtezaj -
                Copyright 2021©</address><br>            <a href="questionnarie.html" target="_blank">Questionnarie</a>
        </footer>
    </div>
    <script>
        let progress = document.getElementById("progressbar");
        let totalHeight = document.body.scrollHeight - window.innerHeight;
        window.onscroll = function () {
            let progressHeight = (window.pageYOffset / totalHeight) * 100;
            progress.style.height = progressHeight + '%';
        }

search = document.getElementById("searchdiv");
img.document.getElementById("imgdiv");
search.addEventListener("mouseover", function(){
    img.classList.add("left-img");
});
search.addEventListener(("mouseout"), function(){
    img.addEventListener.remove("left-img");
});



m1 = document.getElementById("m1")
m2 = document.getElementById("m2")
m3 = document.getElementById("m3")
m4 = document.getElementById("m4")
m5 = document.getElementById("m5")
m6 = document.getElementById("m6")
m7 = document.getElementById("m7")
m8 = document.getElementById("m8")
m9 = document.getElementById("m9")

n1 = document.getElementById("n1")
n2 = document.getElementById("n2")
n3 = document.getElementById("n3")
n4 = document.getElementById("n4")
n5 = document.getElementById("n5")
n6 = document.getElementById("n6")
n7 = document.getElementById("n7")
n8 = document.getElementById("n8")
n9 = document.getElementById("n9")

m1.addEventListener("mouseover", function(){
    n2.classList.add("bottom10");
    n3.classList.add("bottom10");
});

m1.addEventListener("mouseout", function(){
    n2.classList.remove("bottom10");
    n3.classList.remove("bottom10");
});

m2.addEventListener("mouseover", function(){
    m3.classList.add("right10");
    m6.classList.add("right10");
    m9.classList.add("right10");    
    m5.classList.add("right10");
    m8.classList.add("right10");
});

m2.addEventListener("mouseout", function(){
    m3.classList.remove("right10");
    m6.classList.remove("right10");
    m9.classList.remove("right10");
    m5.classList.remove("right10");
    m8.classList.remove("right10");
});

m5.addEventListener("mouseover", function(){
    m3.classList.add("right10");
    m6.classList.add("right10");
    m9.classList.add("right10");    
    m2.classList.add("right10");
    m8.classList.add("right10");
});

m5.addEventListener("mouseout", function(){
    m3.classList.remove("right10");
    m6.classList.remove("right10");
    m9.classList.remove("right10");
    m2.classList.remove("right10");
    m8.classList.remove("right10");
});

m8.addEventListener("mouseover", function(){
    m3.classList.add("right10");
    m6.classList.add("right10");
    m9.classList.add("right10");    
    m5.classList.add("right10");
    m2.classList.add("right10");
});

m8.addEventListener("mouseout", function(){
    m3.classList.remove("right10");
    m6.classList.remove("right10");
    m9.classList.remove("right10");
    m5.classList.remove("right10");
    m2.classList.remove("right10");
});

m3.addEventListener("mouseover", function(){
    m6.classList.add("right10");        
    m9.classList.add("right10");
});

m3.addEventListener("mouseout", function(){
    m6.classList.remove("right10");        
    m9.classList.remove("right10");
});

m6.addEventListener("mouseover", function(){
    m3.classList.add("right10");        
    m9.classList.add("right10");
});

m6.addEventListener("mouseout", function(){
    m3.classList.remove("right10");        
    m9.classList.remove("right10");
});

m9.addEventListener("mouseover", function(){
    m6.classList.add("right10");        
    m3.classList.add("right10");
});

m9.addEventListener("mouseout", function(){
    m6.classList.remove("right10");        
    m3.classList.remove("right10");
});

function startDictation() {
        if (window.hasOwnProperty('webkitSpeechRecognition')) {
          var recognition = new webkitSpeechRecognition();
    
          recognition.continuous = false;
          recognition.interimResults = false;
    
          recognition.lang = 'en-US';
          recognition.start();
    
          recognition.onresult = function (e) {
            var str = e.results[0][0].transcript;
            str = str.slice(0, -1);
            document.getElementById('mysearch').value = str;
            recognition.stop();
        document.getElementById('search-form').submit();
        };
    
          recognition.onerror = function (e) {
            recognition.stop();
          };
        }
      }

function submitform(){
        document.getElementById('search-form').submit();
      }

    </script>
</body>

</html>