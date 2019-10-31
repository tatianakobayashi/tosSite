// get all.json from TOS;DR API
var all;
var infoArray = [];

// Função da extensão oficial - TODO: testar
function getServices() { // eslint-disable-line no-unused-vars
  const requestURL = 'https://tosdr.org/api/1/all.json';

  const driveRequest = new Request(requestURL, {
    method: 'GET',
  });

  return fetch(driveRequest).then((response) => {
    if (response.status === 200) {
      return response.json();
    }
    throw response.status;
  });
}

var classificacaoDict = {
  0: "Sem classificação",
  "false": "Sem classificação",
  "A": "Os Termos de serviço te tratam de forma justa, respeitam seus direitos e seguem as melhores práticas.",
  "B": "Os Termos de serviço são justos com o usuário, mas podem ser melhorados.",
  "C": "Os Termos de serviço são bons, mas alguns problemas precisam da sua consideração.",
  "D": "Os Termos de serviço são muito irregulares ou existem problemas importantes que necessitam da sua atenção.",
  "E": "Os Termos de serviço levantam sérias preocupações."
}

var translation_dict = {
  "This service may collect, use, and share location data": "Este serviço pode coletar, usar e compartilhar dados de localização.",
  "Your data may be processed and stored anywhere in the world": "Suas informações podem ser processadas e armazenadas em qualquer lugar do mundo.",
  "This service tracks you on other websites": "Este serviço pode te monitorar em outros sites.",
  "The service can read your private messages": "Este serviço pode ler suas mensagens privadas.",
  "You agree to defend, indemnify, and hold the service harmless in case of a claim related to your use of the service": "",
  "The service may use tracking pixels, web beacons, browser fingerprinting, and/or device fingerprinting on users.": "",
  "This service can use your content for all their existing and future services": ""
}

var pointDict = {
  "bad": "Ruim",
  "good": "Bom",
  "neutral": "Neutro"
}


// Set rating string
function ratingString(rating){
  return classificacaoDict[rating];
}

function getSiteInfo(siteJson){
  // Save API information on site in an Array
  infoArray=[]
  siteJson.points.forEach(function(point){
    infoArray.push(point); // Already are objects
  })
}

function htmlWithClass(htmlTag, cssClass){
  return "<" + htmlTag +" class=\"" + cssClass + "\">";
}

function endingTag(htmlTag){
  return "</" + htmlTag + ">";
}
