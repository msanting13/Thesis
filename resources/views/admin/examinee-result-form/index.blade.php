<html>
<head>
  <style>
    body { font-family: sans-serif; }
    @page { margin: 100px 25px; }
    header { position: fixed; top: -60px; left: 0px; right: 0px; height: auto;}
    footer { position: fixed; bottom: -60px; left: 0px; right: 0px; background-color: lightblue; height: 50px; }
    p { page-break-after: always; }
    p:last-child { page-break-after: never; }
    .wrapper { margin : 0px 40px; }
    #watermark {
          position: fixed;
          opacity: 0.1;
          bottom:   3cm;
          left:     2cm;
          width:    16cm;
          height:   16cm;
          z-index:  -1000;
    }

      .float-left { float :left; }
      .clearfix { clear:both; }
      .float-right { float :right; }

      .column {
        float: left;
        width: auto;
        height: auto;
      }

      .row:after {
        content: "";
        display: table;
        clear: both;
      }

      .text-center { text-align: center; }
      .text-right { text-align :right; }
      .text-left { text-align :left; }
      .text-underline { 
        text-decoration: underline;
      }
      .font-weight-bold { font-weight: bold; }

      .auto-height { height : auto; }
      .auto-width { width :auto; }

      .table-bordered { border : 1px solid black;}
      .table-collapse { border-collapse: collapse; }
      .border-bottom { border-bottom : 1px solid black; }
  </style>
</head>
<body>
  <header>
    <div class="row">
        <div class="column">
          <img class="img-header" src="https://res.cloudinary.com/dpcxcsdiw/image/upload/v1584302419/sd_bg.png" width="104">
        </div>

        <div class='float-left text-center' style='margin-left : 50px;'>
              <span class='font-weight-bold' style='font-size : 23px;'>SURIGAO DEL SUR STATE UNIVERSITY</span>
            <br>
            <span>Guidance Center</span>
            <br>
            <span>Tel. No (086)214-2735</span>
            <br>
            <span>Tandag City, Surigao del Sur</span>
            <br>
            <a href="https://www.sdssu.edu.ph/" style='text-decoration: none; color :#55b2e0'>www.sdssu.edu.ph</a>
        </div>

        <div class='float-right text-center auto-height' >
          <span class='font-weight-bold'>Reference Code</span>
          <br>
          <span class='font-weight-bold'>FM-GC-005-E</span>
          <br>
          <span>Revision Number </span>
          <br>
          <span class='font-weight-bold'>000</span>
          <br>
          <span>Date Effective</span>
          <br>
          <span class='font-weight-bold'>06/02/2018</span>
        </div>
      </div>
  </header>
   <div id="watermark">
       <img src="https://res.cloudinary.com/dpcxcsdiw/image/upload/v1584302419/sd_bg.png" height="100%" width="100%" />
   </div>
  <main>
    <br>
    <br>
    <br>
    <br>
    <div class='wrapper'>
      <!-- EXAMINEE INFORMATION -->
      <table class="table-collapse" width="100%"  cellpadding="2px">
          <thead>
            <tr>
              <!-- TO MAKE ALL EQUAL WE NEED TO ADD WIDTH HERE -->
              <td class='text-left border-bottom' width="33.3%">&nbsp;Vistal</td>
              <td class='text-center border-bottom'>Christopher</td>
              <td class='text-right border-bottom'>P.&nbsp;</td>
            </tr>
          </thead>
          <tbody>
            <tr class='text-center'>
                <td class='text-left'>&nbsp;Lastname</td>
                <td class='text-center'>Firstname</td>
                <td class='text-right'>M.I&nbsp;</td>
            </tr>
          </tbody>
      </table>

<br>

      <table class="table-collapse" width="100%"  cellpadding="0px">
          <thead>
            <tr>
              <!-- TO MAKE ALL EQUAL WE NEED TO ADD WIDTH HERE -->
              <td class='text-left text-underline'  width="33.3%">&nbsp;Male&nbsp;</td>
              <td class='text-center text-underline'  width="37.3%">&nbsp;&nbsp;&nbsp;17&nbsp;&nbsp;&nbsp;</td>
              <td class='text-right text-underline'>01/06/1997</td>
            </tr>
          </thead>
          <tbody>
            <tr class='text-center'>
                <td class='text-left'>&nbsp;Sex</td>
                <td class='text-center' >Age</td>
                <td class='text-right' >Birthdate&nbsp;</td>
            </tr>
          </tbody>
      </table>

      <br>
      <span>Preferred Course</span>
      <br>
      <span>1st</span>
      <br>
      <span>2nd</span>

      <h5>ENTRANCE EXAM RATING</h5>
      <table class="table-collapse" width="100%" border="1">
          <thead>
            <tr>
              <th rowspan="2" colspan="2" class='text-center' cellpadding="5px" width="70%">Total</th>
              <th width="20%">Raw Score</th>
              <th width="30%">Descriptive Equivalent</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>22</th>
              <th>Below Average</th>
            </tr>

            <tr>
              <th rowspan="3">VERBAL</th>
              <th></th>
              <th>22</th>
              <th>Below Average</th>
            </tr>

            <tr>
              <th>Verbal Comprehension</th>
              <th>22</th>
              <th>Below Average</th>
            </tr>

            <tr>
              <th>Verbal Reasoning</th>
              <th>22</th>
              <th>Below Average</th>
            </tr>


            <tr>
              <th rowspan="3">NON VERBAL</th>
              <th></th>
              <th>22</th>
              <th>Below Average</th>
            </tr>

            <tr>
              <th>Figurative Reasoning</th>
              <th>22</th>
              <th>Below Average</th>
            </tr>

            <tr>
              <th>Quantitative Reasoning</th>
              <th>22</th>
              <th>Below Average</th>
            </tr>


          </tbody>
      </table>
      
      <br>
      <small class='font-weight-bold'>Date Printed : {{ date('m/d/Y h:i A') }}</small>
      <br>
      br
      <small  style='color :red;'><i>NOT VALID IF THERE IS ANY ALTERATION</i></small>
    </div>
  </main>
</body>
</html>