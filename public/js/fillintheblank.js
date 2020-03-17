let btnAddBlankField = document.querySelector('#addBlankField-btn');
let questionnaireEditorElement = document.querySelector('#questionnaireEditor');
let btnAddAnswersKeyFields = document.querySelector('#addAnswersKeyFields-btn');

let questionCategory = document.querySelector('#questionCategory');




questionnaireEditorElement.addEventListener("input", syncQuestionnaireEditorContainer);
btnAddBlankField.addEventListener("click", addBlankField);
btnAddBlankField.addEventListener("click", syncQuestionnaireEditorContainer);
btnAddAnswersKeyFields.addEventListener("click", answersKeyFields);

// This event is incase that the user choose to select an category after entering the question details
questionCategory.addEventListener('change',  (e) => {
    let selectedCategory = questionCategory[questionCategory.selectedIndex].text;
    questionnaireEditorElement.childNodes.forEach((element, length) => {
        if (element instanceof HTMLInputElement && element.type == 'text') {
            element.setAttribute('data-category', selectedCategory);    
        }
    });

});



let ID = function () {
  // Math.random should be unique because of its seeding algorithm.
  // Convert it to base 36 (numbers + letters), and grab the first 9 characters
  // after the decimal.
  return '_' + Math.random().toString(36).substr(2, 9);
};

// data-category to add the category type of question
function addBlankField() {
    let blankField = document.createElement("input");
    setAttributes(blankField, {
        "type": "text",
        "name": "fillInTheBlankField[]",
        "id" : `FITB-${ID()}`,
        "data-type" : "fillIn",
        "class": "fillInTheBlankField form-control col-md-3",
        "data-category" : questionCategory[questionCategory.selectedIndex].text,
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