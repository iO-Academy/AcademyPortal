const reportForm = document.querySelector('#report-form');
const startBtn = document.querySelector( '#run-btn');
const table = document.querySelector('#table')
const message = document.querySelector('#message')
const total = document.querySelector('#total');

const getFormSubmission = () => {
    const regEx =/-/g;

    return {
        reportStart: reportForm.elements['start-date'].value.replace(regEx, ''),
        reportEnd: reportForm.elements['end-date'].value.replace(regEx, ''),
        reportCategory: reportForm.elements['report-category'].value,
    }
}

startBtn.addEventListener('click', e => {
    e.preventDefault();
    const reportSubmission = getFormSubmission();
    
    const extractResponseData = (response) => {
        return response.json();
    }

    const options = {
        credentials: 'same-origin',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
    }

    const url = './api/getApplicantReports/' + reportSubmission.reportStart + '/' + reportSubmission.reportEnd + '/' + reportSubmission.reportCategory;
    const getReportData = async () => {
        const response = await fetch(url, options)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    message.innerText = '';
                    message.classList.remove('alert-danger');
                    total.innerText = 'Total Applicants: ' + data.data[0][0][1];
                    createReportTable(data);
                } else {
                    while (table.firstChild) {
                        table.removeChild(table.firstChild)
                    }
                    total.innerText = '';
                    message.innerText = data.message;
                    message.classList.add('alert-danger');
                }
            }
        )
    }

    const createReportTable = (reportData) => {
        while (table.firstChild) {
            table.removeChild(table.firstChild)
        }
        createTableHead(table, reportData);
        createTableBody(table, reportData);
    };

    const createTableHead = (table, reportData) => {
        const tHead = table.createTHead();
        const row = tHead.insertRow();
        const thOne = document.createElement('th');
        const catHeadOne = document.createTextNode(reportData.data[0][0][0]);
        thOne.appendChild(catHeadOne);
        row.appendChild(thOne);
        const thTwo = document.createElement('th');
        const catHeadTwo = document.createTextNode('No. of Applicants');
        thTwo.appendChild(catHeadTwo);
        row.appendChild(thTwo);
        const thThree = document.createElement('th');
        const catHeadThree = document.createTextNode('Percentage of Applicants');
        thThree.appendChild(catHeadThree);
        row.appendChild(thThree);
    }

    const createTableBody = (table, reportData) => {
        console.log(reportData)

        let data = reportData['data'][1][0];

        let entry = Object.entries(data);
            for (let dataEntry of entry) {
                let row = table.insertRow();
                let tdOne = document.createElement('td');
                let textOne = document.createTextNode(dataEntry[1].report);
                tdOne.appendChild(textOne);
                let tdTwo = document.createElement('td');
                let textTwo = document.createTextNode(dataEntry[1].total);
                tdTwo.appendChild(textTwo);
                let tdThree = document.createElement('td');
                let textThree = document.createTextNode(dataEntry[1][0] + '%');
                tdThree.appendChild(textThree);
                row.appendChild(tdOne);
                row.appendChild(tdTwo);
                row.appendChild(tdThree);
            }
    }

    getReportData();
});
