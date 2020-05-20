/**
 * Gets hiring partner information from the API and passes into the displayHandler function
 */
async function getHiringPartners () {
    await fetch('./api/getHiringPartnerInfo', {
        credentials: "same-origin",
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
    })
    .then(hiringPartnerInfo => hiringPartnerInfo.json())
    .then(hiringPartnerInfo => displayHiringPartnerHandler(hiringPartnerInfo.data))
}

getHiringPartners()


/**
 * Runs a foreach through each hiring partner object and outputs HTML elements with hiring partner's details
 *
 * @param partnerCompanies is an array of objects which contains information about hiring partners
 */
function displayHiringPartnerHandler(partnerCompanies){
    let companyNamesHTML = '';
    partnerCompanies.forEach(function(partnerCompany){
        companyNamesHTML += `<div class="company-name"><a data-id=${partnerCompany.id} type="button"  class="myBtn">${partnerCompany.name}</a></div>`;
    })
    document.querySelector('#companies').innerHTML = companyNamesHTML;
    addEventListenersForModal();
}