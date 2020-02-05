let btnAddBlankField = document.querySelector('#addBlankField-btn');
let questionnaireEditorElement = document.querySelector('#questionnaireEditor');
let btnAddAnswersKeyFields = document.querySelector('#addAnswersKeyFields-btn');

questionnaireEditorElement.addEventListener("input", syncQuestionnaireEditorContainer);
btnAddBlankField.addEventListener("click", addBlankField);
btnAddBlankField.addEventListener("click", syncQuestionnaireEditorContainer);
btnAddAnswersKeyFields.addEventListener("click", answersKeyFields);

function addBlankField() {
    let blankField = document.createElement("input");
    setAttributes(blankField, {
        "type": "text",
        "name": "fillInTheBlankField[]",
        "class": "fillInTheBlankField form-control col-md-3"
    });

    questionnaireEditorElement.appendChild(blankField)
}
function setAttributes(el,attrs) {
    let key;
    for (key in attrs) {
        el.setAttribute(key, attrs[key]);
    }
}
//Syncronization
function syncQuestionnaireEditorContainer() {
    document.getElementById("questionnaireContainer").innerHTML = questionnaireEditorElement.innerHTML;
}
//answers key fields
function answersKeyFields() {
    let numberOfFields, answersKeyFieldsElement, divAnswersKeyFields;

    numberOfFields = document.getElementById("numberAnswersKeyFields").value;
    answersKeyFieldsElement = document.getElementById('answersKeyFields');

    if (numberOfFields == 'Add number of answers field') {
        swal({
            title: "Please select number of answers field!",
            icon: "warning",
        });
    }
    else{
        for (let i = 1; i <= numberOfFields; i++) {
            divAnswersKeyFields = document.createElement("div");
            divAnswersKeyFields.setAttribute("class", "list-group-item removeclass" + i);
            divAnswersKeyFields.innerHTML = '<div class="col-md-1"><i class="mdi mdi-drag-vertical"></i></div><div class="input-group col-md-10"><input type="text" class="form-control" name="answerkey[]" placeholder="Answer here"><span class="input-group-btn"><button class="btn btn-danger" type="button" onclick="removeAnswersKeyFields(' + i + ');"> <i class="fa fa-minus"></i></button></span></div>';

            answersKeyFieldsElement.appendChild(divAnswersKeyFields);
        }
    }
}
function removeAnswersKeyFields(rid) {
    $('.removeclass' + rid).remove();
}