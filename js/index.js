function setInfoInHTML(data){

  var serviceName = htmlWithClass("div", "name") + data.name + endingTag("div");
  var serviceRating = htmlWithClass("div", "rating") + htmlWithClass("span", "tosdrLabel") + "Classificação: " + endingTag("span") + ratingString(data.rated) + endingTag("div");

  getSiteInfo(data);

  var service = serviceName + serviceRating;

  infoArray.forEach(function(content, index){
      var topic = htmlWithClass("div", "topic");
      topic += htmlWithClass("span", "topicTitle") + content.title + endingTag("span");
      topic += htmlWithClass("span", "topicPoint") + pointDict[content.point] + endingTag("span");
      topic += htmlWithClass("span", "topicScore") + content.score + endingTag("span");
      //if(content.privacyRelated){
      //  topic += htmlWithClass("span", "topicPrivacy") + privacyRelated(content.privacyRelated) + endingTag("span");
      //}
      topic += endingTag("div");
      service += topic;
    }
  );
}


getServices().then(function(value){
  console.log(value);
  all = value;
}, function(cause){
  console.log(cause);
}).then(function(val){

// TODO: load list

});
