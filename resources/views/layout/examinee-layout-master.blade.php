<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/67794854_2178648335729029_448519625085288448_n.png">
    <title>Automated Entrance Examination</title>
    <!-- Custom CSS -->
    <link href="/examinee/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="/examinee/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    {{-- [if lt IE 9]> --}}
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
{{-- <![endif] --}}
</head>

<body class="fix-header card-no-border logo-center">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        @include('template.examinee.header')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                @include('template.examinee.left-sidebar')
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                @yield('content')
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © 2019 Surigao del Sur State University
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/assets/plugins/popper/popper.min.js"></script>
    <script src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/examinee/js/sidebarmenu.js"></script>
<!--stickey kit -->
    <script src="/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--stickey kit -->
    <script src="/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="/examinee/js/custom.min.js"></script>
    <script src="/examinee/js/dashboard1.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha256-KsRuvuRtUVvobe66OFtOQfjP8WA2SzYsmm4VPfMnxms=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bcryptjs@2.4.3/dist/bcrypt.js"></script>
    <script src="https://lig-membres.imag.fr/donsez/cours/exemplescourstechnoweb/js_securehash/md5.js"></script>
    {{-- EXAMINEE ANSWER FUNCTION --}}
    <script>
        const bcrypt = dcodeIO.bcrypt;
        let correct  = [];
        let wrong    = [];
        let fillInTheBlankAnswers = [];
        let submitCount = 0;

        Array.prototype.remove = function() {
            var what, a = arguments, L = a.length, ax;
            while (L && this.length) {
                what = a[--L];
                while ((ax = this.indexOf(what)) !== -1) {
                    this.splice(ax, 1);
                }
            }
            return this;
        };
        
        let btnSubmitQuestionaire = document.querySelector('#submitQuestionaire');
        let noOfQuestionsElement = document.querySelector('#noOfQuestions');
        let isExamineeAlreadyAnswer = (id) => {
            if (correct.includes(id)) {
                correct.remove(id);
            } else if(wrong.includes(id)) {
                wrong.remove(id);
            }
        };


        const isMultipleChoice = (event) => event.target.nodeName === 'INPUT' && event.target.type == 'radio';
        const isFillInTheBlank = (event) => event.target.nodeName === 'INPUT' && event.target.type == 'text' && event.target.getAttribute('data-type') === 'fillIn';
        const isIdentification = (event) => event.target.nodeName === 'INPUT' && event.target.type == 'text' && event.target.getAttribute('data-type') === 'identification';
        

        // Ajax request send message to examinee
        const sendSMSmessageToExaminee = (correct, wrong) => {
            $.ajax({
                url: '/message/send',
                type: 'POST',
                data: {examinee_id : {{Auth::user()->id}} , correct : correct, wrong: wrong},
                success : function (response) {
                    console.log(response);
                }
            });
        };

        // For fast answering
        /*document.body.addEventListener('mouseover', (e) => {
            console.log(e.target);
        });*/

        // Function for checking if answer is correct/wrong in multiple choice
        document.body.addEventListener('click', (e) => {
            if (isMultipleChoice(e)) {
                let questionId = e.target.getAttribute('data-id');
                let key = e.target.getAttribute('data-key');
                let selectedChoice = e.target.value.toUpperCase();
                let question = document.querySelector(`#question-${questionId}`).innerHTML;
                if (key.includes(calcMD5(question.substr(0,11).trim()))) {
                    let md5Index = key.indexOf(calcMD5(question.substr(0,11).trim()));
                    key = key.slice(0, md5Index);
                } 
                let status = '';
                bcrypt.compare(selectedChoice, key.replace('$2y$', '$2a$'))
                .then((res) => status = res)
                .then((status) => {
                    if (status) {
                        isExamineeAlreadyAnswer(questionId);
                        isExamineeAlreadyAnswer(questionId);
                        correct.push(questionId);
                    } else {
                        isExamineeAlreadyAnswer(questionId);
                        isExamineeAlreadyAnswer(questionId);
                        wrong.push(questionId);
                    }
                });
            } 
        });

        /* Function for checking answer in "Identification". */
        document.body.addEventListener('focusout', (e) => {
            if (isIdentification(e)) {
                let questionId = e.target.getAttribute('data-id');
                let key = e.target.getAttribute('data-key');
                let answer = e.target.value.toUpperCase();
                let question = document.querySelector(`#question-text-${questionId}`).innerHTML;
                if (key.includes(calcMD5(question.substr(0,11).trim()))) {
                    let md5Index = key.indexOf(calcMD5(question.substr(0,11).trim()));
                    key = key.slice(0, md5Index);
                } 
                let status = '';
                bcrypt.compare(answer, key.replace('$2y$', '$2a$'))
                .then((res) => status = res)
                .then((status) => {
                    if (status) {
                        isExamineeAlreadyAnswer(questionId);
                        isExamineeAlreadyAnswer(questionId);
                        correct.push(questionId);
                    } else {
                        isExamineeAlreadyAnswer(questionId);
                        isExamineeAlreadyAnswer(questionId);
                        wrong.push(questionId);
                    }
                });
            }
        });

        // This function is for Fill in the blank.
        let verify = (encodedAnswer, examineeAnswer, questionId) => {
            let SEPERATOR_CODE = "0x20";
            // We need to check if the decodedAnswer is only one character or more than
            if (encodedAnswer.includes(SEPERATOR_CODE)) {
                // We need to split it by seperator code
                let splitted = encodedAnswer.split(SEPERATOR_CODE);
                let decoded = "";
                splitted.forEach((ascii) => {
                    decoded += String.fromCharCode(ascii);
                });
                // Now let's check the answer of the examinee 
                if (decoded == examineeAnswer) {
                    // Count as correct
                    isExamineeAlreadyAnswer(questionId);
                    isExamineeAlreadyAnswer(questionId);
                    correct.push(questionId);
                } else {
                    isExamineeAlreadyAnswer(questionId);
                    isExamineeAlreadyAnswer(questionId);
                    wrong.push(questionId);
                }
            } else { // We just need to decode the ascii value of the encodedAnswer.
                let decoded = String.fromCharCode(encodedAnswer);
                // Now let's check the answer of the examinee 
                if (decoded == examineeAnswer) {
                    // Count as correct
                    isExamineeAlreadyAnswer(questionId);
                    isExamineeAlreadyAnswer(questionId);
                    correct.push(questionId);
                } else {
                    isExamineeAlreadyAnswer(questionId);
                    isExamineeAlreadyAnswer(questionId);
                    wrong.push(questionId);
                }
            }
        };


        /* Function for checking answer in "Fill in the blank". */
        document.body.addEventListener('focusout', (e) => {
            if (isFillInTheBlank(e)) {
                // Get the parent node or the question container
                // this will help us to get the answers_key & question_id
                let parent     = e.target.parentNode;
                let questionId = parent.getAttribute('data-id');
                let answerKeys = JSON.parse(parent.getAttribute('data-key'));

                // Get the answer of the user
                let answer     = e.target.value;

                let position = 0;
                // Inside of the parent there are so many element we only interested to inputs.
                parent.childNodes.forEach((element, length) => {
                    if (element instanceof HTMLInputElement && element.type == 'text') {
                        if (element == e.target) { // Element inside of parent is equal to examinee selected input
                            // Verify the answer
                            verify(answerKeys[position], e.target.value.toLowerCase(), questionId);
                        }
                        position++;
                    }
                });
            }
        });


        // Examinee submit the questionaire.
        // Having an issue with Input type or in the fill in the blank
        // So to fix we need to submit the form twice to get the last answer in textbox.
        btnSubmitQuestionaire.addEventListener('click' , (e) => {
            if (submitCount == 0) {
                let ask = alert('Please double check all your answers before hitting the submit button.');
                submitCount++;
            } else if(submitCount >= 1) {
                   let [getNoOfQuestions] =  noOfQuestionsElement.innerHTML.match(/(\d+)/); 
                    let noOfQuestions = getNoOfQuestions;
                    let noOfAnsweredQuestions = correct.length + wrong.length;
                    if (noOfQuestions != (noOfAnsweredQuestions)) {
                        swal ('Oops','Please double check all questions maybe you missed some questions.',  'error')
                    } else {
                        swal({
                          title: 'Result',
                          icon : 'success',
                          text : `Correct Answers : ${correct.length} & Wrong Answers ${wrong.length}`
                        });
                        // Process of text message.
                        sendSMSmessageToExaminee(correct, wrong);
                    }
            }
            
            
         
        });
    </script>

    
    {{-- EVENT DISABLE SCRIPT --}}
    <script>
        // Disabled Propagation & Bubble of Element.
        const disabledEvent = (e) => {
            if (e.stopPropagation) {
                e.stopPropagation();
            } else if (window.event) {
                window.event.cancelBubble = true;
            }
            e.preventDefault();
            return false;
        };

        const disabledRightClick = () => {
            document.addEventListener('contextmenu', (e) => {
                e.preventDefault();
            }, false);
        };

        const disableKey = (keyCodes, event) => { if (keyCodes) disabledEvent(event) };

        // Refresh or exit the page.
        // window.addEventListener('beforeunload', (e) => {
        //     let confirmationMessage = "\o/";
        //     (e || window.event).returnValue = confirmationMessage;
        //     return confirmationMessage;
        // });

        window.onload = () => {
                // Disabled Right Click
                disabledRightClick();

                document.addEventListener("keydown", (e) => {
                    // Disable CTRL + SHIFT + O Key or Opening the Bookmarks
                  disableKey(e.ctrlKey && e.shiftKey && e.keyCode == 79, e);

                  // Disable CTRL + O Key
                  disableKey(e.ctrlKey && e.keyCode == 79, e);

                  // Disable CTRL + R Key or Refresh
                  // disableKey(e.ctrlKey && e.keyCode == 82, e);

                  // Disable CTRL + SHIFT + C Key
                  disableKey(e.ctrlKey && e.keyCode == 67, e);

                  // Disable CTRL + SHIFT + I Key
                  disableKey(e.ctrlKey&& e.shiftKey && e.keyCode == 73 , e);

                  // Disable CTRL + S key
                  disableKey(e.ctrlKey && e.keyCode == 83, e);

                  // Disable CTRL + SHIFT + J key
                  disableKey(e.ctrlKey && e.shiftKey && e.keyCode == 74, e);

                  // Disable CTRL + J key
                  disableKey(e.ctrlKey && e.keyCode == 74, e);

                  // Disable CTRL + U key
                  // disableKey(e.ctrlKey && e.keyCode == 85, e);

                  // Disable F12 key
                  // disableKey(event.keyCode == 123, e);
                }, false);
          };
    </script>
</body>
</html>