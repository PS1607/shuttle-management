<?php session_start(); ?>
<?php   
  $t= $_SESSION['logged_user'];
  if($t!=0){

  }
  else{
    header("Location: index.php");
    die();

  }
?>
<?php require_once('Connection/DB_Connection_Way2.php'); ?>
<!DOCTYPE HTML>
<html>
<head>
<title> Shuttle: Travel along! </title>
<meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
* {
  box-sizing: border-box;
}

body {
  height: 100vh;
  background-image: url("background.jpg");
  background-size: 100%;
  background-repeat: no-repeat;
  background-position: center;
  background-size: 100%;
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-weight: 100;
  overflow: hidden;
    
}

.hidden {
  display: none;
}

.row {
  display: flex;
  justify-content: center;
}

.text-center {
  text-align: center;
}

.slide-out-x {
  -webkit-transform: translateX(-100%);
          transform: translateX(-100%);
}

.slide-out-x-alt {
  -webkit-transform: translateX(100%);
          transform: translateX(100%);
}

.slide-out-y {
  -webkit-transform: translateY(-100%);
          transform: translateY(-100%);
}

.slide-out-y-alt {
  -webkit-transform: translateY(100%);
          transform: translateY(100%);
}

.text-violet {
  color: #7f28ff;
}

.text-gray {
  color: #4f4f4f;
}

.feedback-wrapper {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  margin: auto;
  background: white;
  max-width: 480px;
  height: 200px;
  border-radius: 10px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
  transition: 0.55s cubic-bezier(0.1, 1, 0.25, 1.15);
}
.feedback-wrapper.title-hovered:active {
  -webkit-transform: translateY(-5%);
          transform: translateY(-5%);
}
.feedback-wrapper.at-bottom {
  top: auto;
  -webkit-transform: translateY(100%);
          transform: translateY(100%);
  bottom: 68px;
  transition: 0.2s ease-out;
}
.feedback-wrapper.at-bottom:active {
  -webkit-transform: translateY(105%);
          transform: translateY(105%);
}
.feedback-wrapper .feedback-title {
  padding: 20px;
  color: #fff;
  background: #337ab7;
  border-radius: 10px 10px 0 0;
  height: 68px;
}
.feedback-wrapper .feedback-title h1 {
  margin: 0;
  font-size: 1.4rem;
}
.feedback-wrapper .feedback-content {
  max-height: calc(100vh - 68px);
  overflow-y: auto;
}
.feedback-wrapper .feedback-faces {
  padding: 20px;
  height: 130px;
  overflow: hidden;
}

.face-wrapper {
  position: relative;
  left: 0;
  right: 0;
  width: 60px;
  height: 60px;
  padding: 10px;
  box-sizing: content-box;
  transition: 0.25s ease-out;
}
.face-wrapper .face-counter {
  position: absolute;
  right: 0;
  background: #dc230f;
  width: 25%;
  height: 25%;
  text-align: center;
  line-height: 170%;
  font-size: 70%;
  border-radius: 50%;
  font-weight: 800;
  color: #fff;
  z-index: 99;
  box-shadow: inset 0 -1.2px 1.8px #b92413;
  -webkit-transform: rotate(0deg) scale(1);
          transform: rotate(0deg) scale(1);
  transition: 0.25s ease-out;
}
.face-wrapper .face-counter.invisible {
  -webkit-transform: rotate(150deg) scale(0);
          transform: rotate(150deg) scale(0);
  opacity: 0;
}
.face-wrapper .face {
  display: block;
  position: relative;
  background: #ffcd00;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  box-shadow: 0 0.6px 1.2px #cc9117;
  transition: 0.25s ease-out;
}
.face-wrapper .face:not([disabled]) {
  cursor: pointer;
}
.face-wrapper .face:after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  border-radius: 50%;
  box-shadow: inset 0px -3px 9px #eaa514;
  z-index: 9;
}
.face-wrapper .face .eye {
  position: absolute;
  width: 15.6px;
  height: 15.6px;
  margin-top: 32%;
  left: 18%;
  border-radius: 50%;
  transition: 0.25s ease-out;
}
.face-wrapper .face .eye:last-of-type {
  right: 18%;
  left: auto;
}
.face-wrapper .face .eye .pupil {
  position: absolute;
  background: #000;
  left: 0;
  right: 0;
  top: 0;
  margin: auto;
  width: 85%;
  height: 85%;
  border-radius: 50%;
  background: #794014;
  box-shadow: inset 0 -1.2px 0.6px 0px #ca7432;
  transition: width 0.25s ease-out, height 0.25s ease-out;
}
.face-wrapper .face .eye .eyelid {
  position: absolute;
  width: 100%;
  height: 0%;
  bottom: -5%;
  border-radius: 50%;
  background: #ffcd27;
  transition: 0.25s ease-out;
}
.face-wrapper .face .mouth-wrapper {
  position: absolute;
  top: 60%;
  width: 100%;
}
.face-wrapper .face .mouth-wrapper .mouth {
  width: 40%;
  height: 14.4px;
  background: #784015;
  left: 0;
  right: 0;
  margin: auto;
  position: relative;
  border-radius: 290%;
  box-shadow: inset 0 -1.2px 0.6px 0px #ca7432;
  transition: 0.25s ease-out;
}
.face-wrapper .face .mouth-wrapper .mouth:before {
  content: '';
  position: absolute;
  width: 120%;
  height: 73%;
  background: #ffcd27;
  border-radius: 0 0 140% 140%;
  top: 0;
  left: -10%;
  transition: 0.25s ease-out;
}
.face-wrapper .face.grayscale {
  -webkit-transform: scale(0.9);
          transform: scale(0.9);
  background: #d3d3d3;
  box-shadow: 0 0.6px 1.2px #ccc;
}
.face-wrapper .face.grayscale:after {
  box-shadow: inset 0px -3px 9px #bbbbbb;
}
.face-wrapper .face.grayscale .pupil {
  background: #4f4f4f;
  box-shadow: inset 0 -1.2px 0.6px 0px #949494;
}
.face-wrapper .face.grayscale .eyelid {
  background: #d3d3d3;
}
.face-wrapper .face.grayscale.face-love .eyelid, .face-wrapper .face.grayscale.face-love .eyelid:before, .face-wrapper .face.grayscale.face-love .eyelid:after {
  background: #707070;
}
.face-wrapper .face.grayscale .mouth {
  background: #4f4f4f;
  box-shadow: inset 0 -1.2px 0.6px 0px #949494;
}
.face-wrapper .face.grayscale .mouth:before {
  background: #d3d3d3;
}
.face-wrapper:hover .face {
  -webkit-transform: scale(1.1);
          transform: scale(1.1);
}
.face-wrapper:hover .eyes-wrapper {
  -webkit-animation: shake infinite 0.15s;
          animation: shake infinite 0.15s;
  -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  -webkit-perspective: 1000px;
          perspective: 1000px;
}
.face-wrapper:hover .eyes-wrapper .eyelid {
  height: 50%;
}
.face-wrapper:hover .mouth-wrapper .mouth {
  -webkit-transform: scaleX(1.2);
          transform: scaleX(1.2);
}
.face-wrapper:hover .mouth-wrapper .mouth:before {
  -webkit-transform: translateY(-20%) scaleY(0.75);
          transform: translateY(-20%) scaleY(0.75);
}
.face-wrapper:active .face {
  -webkit-transform: scale(1.05);
          transform: scale(1.05);
}
.face-wrapper:active .eyes-wrapper .eye .eyelid {
  height: 75%;
}

.face-wrapper .face-sad .mouth-wrapper .mouth {
  height: 2.4px;
  top: 8.4px;
  border-radius: 4.2px;
  width: 30%;
}
.face-wrapper .face-sad .mouth-wrapper .mouth:before {
  display: none;
}
.face-wrapper:hover .face-sad .eyes-wrapper .eye {
  -webkit-transform: scale(0.9);
          transform: scale(0.9);
}
.face-wrapper:hover .face-sad .eyes-wrapper .eyelid {
  height: 0;
}
.face-wrapper:hover .face-sad .mouth-wrapper .mouth {
  -webkit-transform: scaleX(0.9) rotateZ(-10deg);
          transform: scaleX(0.9) rotateZ(-10deg);
}
.face-wrapper:active .face-sad .eyes-wrapper .eye .pupil {
  top: 0%;
  height: 70%;
}

.face-wrapper .face-disappointed .mouth-wrapper {
  -webkit-transform: rotateZ(-180deg);
          transform: rotateZ(-180deg);
}
.face-wrapper .face-disappointed .mouth-wrapper .mouth {
  top: -6px;
  height: 9px;
}
.face-wrapper .face-disappointed .mouth-wrapper .mouth:before {
  -webkit-transform: translateY(-30%);
          transform: translateY(-30%);
  width: 120%;
  height: 120%;
}
.face-wrapper:hover .face-disappointed .eyes-wrapper .eye {
  -webkit-transform: scale(0.9);
          transform: scale(0.9);
}
.face-wrapper:hover .face-disappointed .eyes-wrapper .eyelid {
  height: 0;
}
.face-wrapper:hover .face-disappointed .mouth-wrapper .mouth {
  -webkit-transform: translateY(-5%) scale3d(0.8, 1, 1);
          transform: translateY(-5%) scale3d(0.8, 1, 1);
}
.face-wrapper:hover .face-disappointed .mouth-wrapper .mouth:before {
  -webkit-transform: translateY(-30%);
          transform: translateY(-30%);
  width: 120%;
  height: 120%;
}
.face-wrapper:active .face-disappointed .eyes-wrapper .eye .pupil {
  top: 0%;
  height: 70%;
}

.face-wrapper .face-wtf .mouth-wrapper {
  -webkit-transform: rotateZ(-180deg);
          transform: rotateZ(-180deg);
}
.face-wrapper .face-wtf .mouth-wrapper .mouth {
  top: -3.6px;
}
.face-wrapper:hover .face-disappointed .mouth-wrapper .mouth {
  top: -3.6px;
}

.face-wrapper .face-love .eye .pupil {
  background: none;
  box-shadow: none;
}
.face-wrapper .face-love .eye .eyelid {
  position: absolute;
  -webkit-transform: rotate(-45deg);
          transform: rotate(-45deg);
  width: 12px;
  height: 12px;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  background: #dc0e0e;
  border-radius: 0;
  z-index: 999;
  transition: 0.25s ease-out, background 0s;
}
.face-wrapper .face-love .eye .eyelid:before, .face-wrapper .face-love .eye .eyelid:after {
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  background: #dc0e0e;
  top: -50%;
  border-radius: 50% 50% 0 0;
}
.face-wrapper .face-love .eye .eyelid:after {
  top: auto;
  right: -50%;
  border-radius: 0 50% 50% 0;
}
.face-wrapper:hover .face-love .eyes-wrapper .eye .eyelid {
  -webkit-transform: translateY(-5px) rotate(-45deg) scale3d(1.1, 1.1, 1.1);
          transform: translateY(-5px) rotate(-45deg) scale3d(1.1, 1.1, 1.1);
}
.face-wrapper:active .face-love .eyes-wrapper .eye .pupil {
  top: 0%;
  height: 85%;
}
.face-wrapper:active .face-love .eyes-wrapper .eye .eyelid {
  height: 12px;
  -webkit-transform: translateY(-5px) rotate(-45deg) scale3d(1.3, 1.3, 1.3);
          transform: translateY(-5px) rotate(-45deg) scale3d(1.3, 1.3, 1.3);
}

@-webkit-keyframes shake {
  0%, 100% {
    -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
  }
  25% {
    -webkit-transform: translate3d(1%, 1%, 0);
            transform: translate3d(1%, 1%, 0);
  }
  75% {
    -webkit-transform: translate3d(1%, 1%, 0);
            transform: translate3d(1%, 1%, 0);
  }
}

@keyframes shake {
  0%, 100% {
    -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
  }
  25% {
    -webkit-transform: translate3d(1%, 1%, 0);
            transform: translate3d(1%, 1%, 0);
  }
  75% {
    -webkit-transform: translate3d(1%, 1%, 0);
            transform: translate3d(1%, 1%, 0);
  }
}

</style>
<body>
<br>
<div align="center">
	 <button onclick="location.href='user.php'" type="button" class="btn btn-primary" value="back">Back</button>
</div><br><br>
<div align="center">
  <form id="feedback" action="#" method="POST" style="width: 40%; margin-left: auto; margin-right: auto;">
        <label for="usrname">Name: </label>
        <input type="text" name="usrname">
        <button name="add" type="submit" value="add" class="btn btn-primary">Submit</button>
</form>
<br>
<textarea rows="4" cols="50" name="comment" form="feedback">
Enter text here...</textarea>

</div>


<div class="feedback-wrapper at-bottom">
  <div class="feedback-title">
    <h1 class="text-center">How would you rate this software?
    </h1>
  </div>
  <div class="feedback-content">
    <div class="feedback-faces">
      <div class="row">
        <div class="face-wrapper slide-out-y-alt">
          <div class="face-counter invisible" data-title-none="No one rated it like this" data-title-one="One person rated it like this" data-title-many="other people rated it like this"></div>
          <input class="rate-input hidden" id="rate-0" type="radio" name="rating" value="0"/>
          <label class="face grayscale face-wtf" for="rate-0" data-hint="Oh God! Why?!">
            <div class="eyes-wrapper">
              <div class="eye">
                <div class="pupil">
                  <div class="eyelid"></div>
                </div>
              </div>
              <div class="eye">
                <div class="pupil">
                  <div class="eyelid"></div>
                </div>
              </div>
            </div>
            <div class="mouth-wrapper">
              <div class="mouth"></div>
            </div>
          </label>
        </div>
        <div class="face-wrapper slide-out-y-alt">
          <div class="face-counter invisible" data-title-none="No one rated it like this" data-title-one="One person rated it like this" data-title-many="other people rated it like this"></div>
          <input class="rate-input hidden" id="rate-1" type="radio" name="rating" value="1"/>
          <label class="face grayscale face-disappointed" for="rate-1" data-hint="It sucks...">
            <div class="eyes-wrapper">
              <div class="eye">
                <div class="pupil">
                  <div class="eyelid"></div>
                </div>
              </div>
              <div class="eye">
                <div class="pupil">
                  <div class="eyelid"></div>
                </div>
              </div>
            </div>
            <div class="mouth-wrapper">
              <div class="mouth"></div>
            </div>
          </label>
        </div>
        <div class="face-wrapper slide-out-y-alt">
          <div class="face-counter invisible" data-title-none="No one rated it like this" data-title-one="One person rated it like this" data-title-many="other people rated it like this"></div>
          <input class="rate-input hidden" id="rate-2" type="radio" name="rating" value="2"/>
          <label class="face grayscale face-sad" for="rate-2" data-hint="It's ok. I guess.">
            <div class="eyes-wrapper">
              <div class="eye">
                <div class="pupil">
                  <div class="eyelid"></div>
                </div>
              </div>
              <div class="eye">
                <div class="pupil">
                  <div class="eyelid"></div>
                </div>
              </div>
            </div>
            <div class="mouth-wrapper">
              <div class="mouth"></div>
            </div>
          </label>
        </div>
        <div class="face-wrapper slide-out-y-alt">
          <div class="face-counter invisible" data-title-none="No one rated it like this" data-title-one="One person rated it like this" data-title-many="other people rated it like this"></div>
          <input class="rate-input hidden" id="rate-3" type="radio" name="rating" value="3"/>
          <label class="face grayscale face-happy" for="rate-3" data-hint="This is great!">
            <div class="eyes-wrapper">
              <div class="eye">
                <div class="pupil">
                  <div class="eyelid"></div>
                </div>
              </div>
              <div class="eye">
                <div class="pupil">
                  <div class="eyelid"></div>
                </div>
              </div>
            </div>
            <div class="mouth-wrapper">
              <div class="mouth"></div>
            </div>
          </label>
        </div>
        <div class="face-wrapper slide-out-y-alt">
          <div class="face-counter invisible" data-title-none="No one rated it like this" data-title-one="One person rated it like this" data-title-many="other people rated it like this"></div>
          <input class="rate-input hidden" id="rate-4" type="radio" name="rating" value="4"/>
          <label class="face grayscale face-love" for="rate-4" data-hint="OMG! I love it!">
            <div class="eyes-wrapper">
              <div class="eye">
                <div class="pupil">
                  <div class="eyelid"></div>
                </div>
              </div>
              <div class="eye">
                <div class="pupil">
                  <div class="eyelid"></div>
                </div>
              </div>
            </div>
            <div class="mouth-wrapper">
              <div class="mouth"></div>
            </div>
          </label>
        </div>
      </div>
      <div class="faces-hint text-center text-gray" data-default-hint="">
      </div>
    </div>
  </div>
</div>

<script>
const $canvas = $('body');
const $eyes = $('.eye');
const $rateInputs = $('.rate-input');


function vendorize(key, value) {
  const vendors = ['webkit', 'moz', 'ms', 'o', ''];
  var result = {};

  vendors.map(vendor => {
    const vKey = vendor ? '-' + vendor + '-' + key : key;

    result[vKey] = value;
  });

  return result;
}

//https://github.com/jfmdev/jqEye/blob/master/Source/jqeye.js
function circle_position(x, y, r) {
  // Circle: x^2 + y^2 = r^2
  var res = { x: x, y: y };
  if (x * x + y * y > r * r) {
    if (x !== 0) {
      var m = y / x;
      res.x = Math.sqrt(r * r / (m * m + 1));
      res.x = x > 0 ? res.x : -res.x;
      res.y = Math.abs(m * res.x);
      res.y = y > 0 ? res.y : -res.y;
    } else {
      res.y = y > 0 ? r : -r;
    }
  }
  return res;
};

function findCenter(coords, sizeX, sizeY) {
  return {
    x: coords.left + sizeX / 2,
    y: coords.top + sizeY / 2 };

}


function deltaVal(val, targetVal) {
  const delta = Math.min(100.0, ts - prevTs);
  const P = 0.001 * delta;

  return val + P * (targetVal - val);
}


function changeEyesPosition(px, py) {
  function changePosition() {
    const $t = $(this);
    const $pupil = $t.find('.pupil');
    const t_w = $t.width();
    const t_h = $t.height();
    const t_o = $t.offset();
    const t_p = $t.position();
    const abs_center = findCenter(t_o, t_w, t_h);
    const pos_x = px - abs_center.x + $(window).scrollLeft();
    const pos_y = py - abs_center.y + $(window).scrollTop();
    const cir = circle_position(pos_x, pos_y, t_w / 20);
    const styles = vendorize('transform', 'translateX(' + cir.x + 'px) translateY(' + cir.y + 'px)');

    $pupil.css(styles);
  }

  $eyes.each(changePosition);
}

function handleMouseMove(e) {
  const px = e.pageX,
  py = e.pageY;

  changeEyesPosition(px, py);
}

$canvas.on('mousemove', handleMouseMove);


function getFace($element) {
  return $element.parent('.face-wrapper').find('.face');
}


function handleFaceHover($face) {
  const $hint = $('.faces-hint');
  const hintText = $face.attr('data-hint') || $hint.attr('data-default-hint');
  $hint.text(hintText);
}


function handleFacesHover(e) {
  const $face = getFace($(e.target));

  handleFaceHover($face);
}

$('.feedback-faces').on('mousemove', handleFacesHover);



function handleFeedbackTitleHover(e) {
  const isHover = e.type === 'mouseenter';
  $(this).parent().toggleClass('title-hovered', isHover);
}

$('.feedback-title').on('mouseenter mouseleave', handleFeedbackTitleHover);


function handleFeedbackToggle() {
  const $this = $(this),
  $parent = $this.parent();

  $parent.toggleClass('at-bottom');

  $parent.find('.face-wrapper').each(function (index) {
    setTimeout(function (face) {
      face.toggleClass('slide-out-y-alt', $parent.hasClass('at-bottom'));
    }, (index - 1) * 40, $(this));
  });
}
$('.feedback-title').on('click', handleFeedbackToggle);



function handleRateInputChange() {
  const rating = parseInt($(this).val());

  getFace($rateInputs).addClass('grayscale');
  getFace($(this)).removeClass('grayscale');
  postRating(rating);
}

$rateInputs.on('change', handleRateInputChange);



//Firebase stuff

function setCounter(stats) {
  const $counters = $('.face-counter');

  function setTitle($counter, size) {
    var titleType = '',
    titlePrefix = '';
    if (size === 0) {
      titleType = 'none';
    } else if (size === 1) {
      titleType = 'one';
    } else {
      titleType = 'many';
      titlePrefix = `${size} `;
    }

    $counter.attr({
      'title': titlePrefix + $counter.attr(`data-title-${titleType}`) });

  }

  $counters.each(index => {
    const $counter = $counters.eq(index),
    size = stats[index] || 0;

    $counter.text(size);
    setTitle($counter, size);
    $counter.removeClass('invisible');
  });

}


function getTotalRating() {
  var stats = {};
  firebase.database().ref('votes').limitToLast(1000).once('value', snapshot => {
    snapshot.forEach(snap => {
      const val = snap.val();
      var voteStat = stats[val.vote];

      voteStat = voteStat ? voteStat + 1 : 1;
      stats[val.vote] = voteStat;

    });
    setCounter(stats);
  });
}


function postRating(rating) {
  const currentUser = firebase.auth().currentUser;

  if (currentUser) {
    const uid = currentUser.uid;
    const data = {
      vote: rating,
      time: new Date().getTime() };


    firebase.database().ref(`votes/${uid}`).set(data).then(getTotalRating);
  }
}


function loginFB() {
  console.log('login');
  firebase.auth().signInAnonymously().then(user => {
    console.log(firebase.auth().currentUser.uid);
  }).catch(function (error) {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
    if (errorCode === 'auth/operation-not-allowed') {
      alert('You must enable Anonymous auth in the Firebase Console.');
    } else {
      console.error(error);
    }
  });
}

function initFB() {
  var config = {
    apiKey: "AIzaSyA7-zbUFMXGItgDwVyfS0IVlqjCytQxQ8k",
    authDomain: "greatest-ever.firebaseapp.com",
    databaseURL: "https://greatest-ever.firebaseio.com",
    projectId: "greatest-ever",
    storageBucket: "greatest-ever.appspot.com",
    messagingSenderId: "784422044422" };

  firebase.initializeApp(config);

  if (!firebase.auth().currentUser) {
    loginFB();
  }

}

initFB();
</script>
</body>
</html>

<?php
if(isset($_POST['add']))
{

  $name= $_POST['usrname'];
  $t = $_SESSION['logged_user'];
  $feedback = $_POST['comment'];
  $now=date('H:i:s');
  if($t!=0){
    $sql_url1 = "INSERT INTO feedback (cid, name, feedback)
              VALUES ('$t', '$name', '$feedback');"; 
    if ($conn->query($sql_url1) === TRUE) {
    echo '<script type="text/javascript">
          alert("Feedback Submitted")
          window.location="user.php";
          </script>'; 
    } 
    else {
        echo "Error: " . $sql_url1 . "<br>" . $conn->error;
    }
  }

}




?>





