//this function calculates the appropriate resourceID to query the db for
function intCalc(one, two) {
    //two options selected by users have numeric values
    formOne = document.getElementById(one).value;
    formTwo = document.getElementById(two).value;
    
    //absolute difference is found and used in a switch case to determine necessary resourceID
    difference = Math.abs(formOne - formTwo);

    switch(difference) {
        case 0: resource = 17;
        break;

        case 1: resource = 18;
        break;

        case 2: resource = 19;
        break;

        case 3: resource = 20;
        break;

        case 4: resource = 21;
        break;

        case 5: resource = 22;
        break;

        case 6: resource = 23;
        break;

        case 7: resource = 24;
        break;
    };

    //set resourceID as form option used in the  getResource() and offerResource() functions
    document.getElementById('intSelectRes').value = resource;

    //submit form
    document.getElementById('intCalcResForm').submit();
};