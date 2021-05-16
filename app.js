//buttons
const startButton = document.querySelector("#start-button");
const showResultsButton = document.querySelector("#results-button");

//result div
const result = document.querySelector("#result");

//add event listener to start button
startButton.addEventListener("click", startTest);

//function handles the logic required for the application
function startTest() {
  //default values
  let startTime = new Date();
  let score = 0;
  let n = 0;

  //time to be tested against and while loop condition
  let testTime = (d = new Date(startTime.getTime() + 15000));
  let stop = false;

  console.log("starting");

  //if current time is less than start time + 15 seconds, check if n is prime and add 1 if it is. Add another one. Else do nothing
  while (stop === false) {
    if (testTime > Date.now()) {
      if (isPrimeNumber(n) === true) {
        score++;
      }
      score++;
      n++;
    } else {
      stop = true;
    }
  }

  //Display the result
  result.textContent = `Result: ${score}`;

  //get browser information
  getInfo(startTime, score);

  console.log("done");
}

function getInfo(time, Score) {
  //time and score are passed in
  let dateTime = time;
  let score = Score;

  let ip;

  //get OS
  let os = getOS();
  console.log(os);

  //get users browser
  let browser = getBrowser();
  console.log(browser);

  //get number of CPU cores
  let cores = navigator.hardwareConcurrency;
  console.log(cores);
  let ram;
  let downloadSpeed;
  let latency;
}

//function to check if a number is prime
function isPrimeNumber(n) {
  if (n === 1) {
    return false;
  } else if (n === 2) {
    return true;
  } else {
    for (var x = 2; x < n; x++) {
      if (n % x === 0) {
        return false;
      }
    }
    return true;
  }
}

//function to get users OS
function getOS() {
  if (navigator.appVersion.indexOf("Win") != -1) {
    name = "Win";
  }
  if (navigator.appVersion.indexOf("Mac") != -1) {
    name = "Mac";
  }
  if (navigator.appVersion.indexOf("X11") != -1) {
    name = "Unix";
  }
  if (navigator.appVersion.indexOf("Linux") != -1) {
    name = "Linux";
  }

  return name;
}

//function to get users browser
function getBrowser() {
  var userBrowser,
    userAgent = navigator.userAgent;

  if (userAgent.indexOf("Firefox") > -1) {
    userBrowser = "Mozilla Firefox";
    // "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:61.0) Gecko/20100101 Firefox/61.0"
  } else if (userAgent.indexOf("SamsungBrowser") > -1) {
    userBrowser = "Samsung Internet";
    // "Mozilla/5.0 (Linux; Android 9; SAMSUNG SM-G955F Build/PPR1.180610.011) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/9.4 Chrome/67.0.3396.87 Mobile Safari/537.36
  } else if (userAgent.indexOf("Opera") > -1 || userAgent.indexOf("OPR") > -1) {
    userBrowser = "Opera";
    // "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36 OPR/57.0.3098.106"
  } else if (userAgent.indexOf("Trident") > -1) {
    userBrowser = "Microsoft Internet Explorer";
    // "Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; .NET4.0C; .NET4.0E; Zoom 3.6.0; wbx 1.0.0; rv:11.0) like Gecko"
  } else if (userAgent.indexOf("Edge") > -1) {
    userBrowser = "Microsoft Edge";
    // "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36 Edge/16.16299"
  } else if (userAgent.indexOf("Chrome") > -1) {
    userBrowser = "Google Chrome";
    // "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/66.0.3359.181 Chrome/66.0.3359.181 Safari/537.36"
  } else if (userAgent.indexOf("Safari") > -1) {
    userBrowser = "Apple Safari";
    // "Mozilla/5.0 (iPhone; CPU iPhone OS 11_4 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/11.0 Mobile/15E148 Safari/604.1 980x1306"
  } else {
    userBrowser = "unknown";
  }

  return userBrowser;
}
