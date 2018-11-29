let validateFormInputs = (data) => {
    let validate = []
    if(data.name.length >= 1 && data.name.length <= 255){
        validate['name'] = 1
    } else {
        validate['name'] = 0
    }

    if(data.email.length >= 1 && data.email.length <= 255){
        validate['email'] = 1
    } else {
        validate['email'] = 0
    }

    if(data.phoneNumber.length >= 1 && data.phoneNumber.length <= 255){
        validate['phoneNumber'] = 1
    } else {
        validate['phoneNumber'] = 0
    }

    if(data.whyDev.length >= 1 && data.whyDev.length <= 255){
        validate['whyDev'] = 1
    } else {
        validate['whyDev'] = 0
    }

    if(data.codeExperience.length >= 1 && data.codeExperience.length <= 255){
        validate['codeExperience'] = 1
    } else {
        validate['codeExperience'] = 0
    }

    if(data.hearAboutId.length >= 1 && data.hearAboutId.length <= 255){
        validate['hearAboutId'] = 1
    } else {
        validate['hearAboutId'] = 0
    }
    return validate
}