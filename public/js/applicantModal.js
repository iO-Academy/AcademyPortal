
function displayField(data, field, noDataMessage = 'No information provided', zeroMessage = null) {
    if (data[field] === 0 && zeroMessage !== null) {
        document.getElementById(field).innerHTML = zeroMessage
        return
    }

    if (data[field] === '' || data[field] === null || data[field] === undefined || data[field] === 0 || data[field] === false) {
        document.getElementById(field).innerHTML = '<span class="text-danger">' + noDataMessage + '</span>'
    } else {
        document.getElementById(field).innerHTML = data[field]
    }
}

function prettyDate(date) {
    if (typeof date !== 'string' || date.length === 0) {
        return null;
    }
    date = new Date(date);
    let dateOptions = {year: 'numeric', month: 'numeric', day: 'numeric'};
    return date.toLocaleDateString("en-GB",dateOptions)
}

function aptitudeColors(score) {
    if (score === null) {
        return null
    }
    if (score > 97) {
        return `<span class="text-warning">${score}%</span>`
    } else if (score >= 70) {
        return `<span class="text-success">${score}%</span>`
    } else {
        return `<span class="text-danger">${score}%</span>`
    }
}

function addCurrency(number) {
    if (number !== null) {
        return '&pound;' + number.toLocaleString()
    }
    return 'Unknown'
}
function copyToClipboard(element) {
    let $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
    document.querySelector("button.clipboard").innerText = 'Copied';
}

$(document).ready(function(){
    $(".myBtn").click(function(){
        let url = './api/getApplicant/' + this.dataset.id
        let studentUrl = 'http://localhost:8080/public/'+this.dataset.id
        fetch(url)
            .then(
                function(response) {
                    if (response.status !== 200) {
                        document.querySelector('#modal-main').innerHTML = ''
                        document.querySelector('#modal-main').innerHTML += '<div class="alert alert-danger" role="alert">Looks like there was a problem. Status Code: ' +
                        response.status + '</div>'
                        return
                    }
                    // Examine the text in the response
                    response.json().then(function(data) {

                        document.querySelectorAll('#applicantModal section.student').forEach(section => {
                            if (data.isStudentStage === "1") {
                                section.classList.remove('hidden')
                            } else {
                                section.classList.add('hidden')
                            }
                        })


                        data.dateTimeAdded = prettyDate(data.dateTimeAdded);
                        displayField(data, 'dateTimeAdded')
                        document.getElementById('apprentice').innerHTML = ''
                        if (data.apprentice === 1) {
                            document.getElementById('apprentice').innerHTML = 'Apprentice'
                        }

                        displayField(data, 'name')
                        displayField(data, 'email')
                        displayField(data, 'phoneNumber')

                        displayField(data, 'stageName')
                        document.querySelector('#stageOptionNameContainer').style.display = 'block'
                        displayField(data, 'stageOptionName')
                        if (data.stageOptionName === null) {
                            document.querySelector('#stageOptionNameContainer').style.display = 'none'
                        }
                        displayField(data, 'cohortDate')
                        displayField(data, 'backgroundInfo')
                        displayField(data, 'whyDev')
                        displayField(data, 'codeExperience')
                        displayField(data, 'hearAbout')
                        displayField(data, 'eligible', 'Not eligible to study in the UK')
                        displayField(data, 'eighteenPlus', 'Under 18')
                        displayField(data, 'finance', 'No')
                        if (data.eligible !== 0) {
                            document.getElementById('eligible').innerHTML = 'Eligible to study in the UK'
                        }
                        if (data.eighteenPlus !== 0) {
                            document.getElementById('eighteenPlus').innerHTML = 'Over 18'
                        }
                        if (data.finance !== 0) {
                            document.getElementById('finance').innerHTML = 'Yes'
                        }
                        displayField(data, 'notes')

                        data.taster = prettyDate(data.taster)
                        displayField(data, 'taster', 'Did not book onto a taster session')
                        if (data.taster !== null && (data.tasterAttendance === null || data.tasterAttendance === 0)) {
                            displayField(data, 'tasterAttendance', 'Did not attend the booked session')
                        }

                        data.assessmentDay = prettyDate(data.assessmentDay)
                        displayField(data, 'assessmentDay', 'Not yet booked')
                        if (data.assessmentDay !== null) {
                            displayField(data, 'assessmentTime', 'Not yet booked')
                        }
                        data.aptitude = aptitudeColors(data.aptitude)
                        displayField(data, 'aptitude', 'Not yet taken')

                        displayField(data, 'diversitechInterest', 'Not asked yet', 'No')
                        if (data.diversitechInterest === 1) {
                            document.getElementById('diversitechInterest').innerHTML = 'Yes'
                        }
                        displayField(data, 'assessmentNotes', 'No notes written')
                        data.diversitech = addCurrency(data.diversitech)
                        data.edaid = addCurrency(data.edaid)
                        data.upfront = addCurrency(data.upfront)
                        displayField(data, 'diversitech')
                        displayField(data, 'edaid')
                        displayField(data, 'upfront')
                        displayField(data, 'laptop', 'Unknown', 'No')
                        if (data.laptop === 1) {
                            document.getElementById('laptop').innerHTML = 'Yes'
                        }
                        displayField(data, 'laptopDeposit', 'No')
                        if (data.laptopDeposit === 1) {
                            document.getElementById('laptopDeposit').innerHTML = 'Yes'
                        }
                        displayField(data, 'laptopNum', 'Not assigned')
                        data.kitCollectionDay = prettyDate(data.kitCollectionDay)
                        displayField(data, 'kitCollectionDay', 'Not yet booked')
                        if (data.kitCollectionDay !== null) {
                            displayField(data, 'kitCollectionTime', 'Not yet booked')
                        }
                        displayField(data, 'kitNum', 'Not assiged')
                        displayField(data, 'team', 'Not assigned')
                        document.getElementById('userProfileLink').innerHTML = studentUrl;
                        document.getElementById('userProfileLink').href = studentUrl;
                        $(".clipboard").click(function(){
                            copyToClipboard('#userProfileLink')
                        })
                        displayField(data, 'githubUsername', 'Unknown')
                        displayField(data, 'portfolioUrl', 'Unknown')
                        displayField(data, 'pleskHostingUrl', 'Not created')
                        displayField(data, 'githubEducationLink', 'Not created')
                        displayField(data, 'additionalNotes', 'No notes')
                        data.chosenCourseDate = prettyDate(data.chosenCourseDate)
                        displayField(data, 'chosenCourseDatePretty', 'Not asked yet')
                        // displayField(data,'userProfileLink', 'No Link Yet' )
                    })
                }
            )

        $("#applicantModal").modal()
    })
})
