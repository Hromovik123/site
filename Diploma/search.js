function element(id) {
     return document.getElementById(id);
 }
	let allSearchData = ""; //decleared to collect all search names

      //gets each inputs data starting from second input
      function getResults() {
        //gets value of input
        let search = element("search-input").value;
        allSearchData = ""; //clears data for each word typed

        hideSearchResults();
        clearSearchResults();
        clearSearchData(); //
        //starts searching from the second input
        if (search.length > 1) {
          let counter = 0; // counts to 10
          for (let x of Object.keys(object1)) {
                let filmproperty = object1[x];
                let filmlink = filmproperty[0];
                let image = filmproperty[1]
            if (counter < 10) {
              //checks for similarities
              if (x.toLowerCase().includes(search.toLowerCase())) {
                //populates the suggestion div
                element("search-results").innerHTML +=
                  "<div class='search-item' onclick='displayData(\"" +
                  x + 
                  "\")'><p><img class='img_search' src="+ image +">" +
                  filmlink
                  "</p></div>";

                counter++;
              }
            }
            if (x.toLowerCase().includes(search.toLowerCase()))
              //saves all the realated names
              allSearchData += "<p>" + x + "</p>"; //after enter response
          }
          displaySearchResults();
        }
      }
      //displays the suggestion div
      function displaySearchResults() {
        element("search-results").style.display = "block";
      }
      //clears the suggestion div
      function clearSearchResults() {
        element("search-results").innerHTML = "";
      }

      //hides the suggestion div
      function hideSearchResults() {
        element("search-results").style.display = "none";
      }
      //displays names when you click a suggestions
      function displayData(name) {
        element("search-data").innerHTML = "<p>" + name + "</p>";
        hideSearchResults();
      }
      //displays all related names to your search when you hit enter
      function displayAllData(names) {
        element("search-data").innerHTML = names;
        hideSearchResults();
      }
      //clears names displayed from search result
      function clearSearchData() {
        element("search-data").innerHTML = "";
      }
      //gets results after each input
      element("search-input").oninput = function() {
        getResults();
      };

      element("search-input").addEventListener("keyup", function(event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
          // Cancel the default action, if needed
          event.preventDefault();
          // Trigger the button element with a click
          displayAllData(allSearchData);
        }
      });
   
   // for test object " " 
for (let x of Object.keys(object1)) { // x = "filmname" :
  var filmproperty = object1[x]; // ['1','2']
  var filmlink = filmproperty[0]; // ['1']
  var image = filmproperty[1]// ['2']
  console.log(x,filmproperty, filmlink, image);
}
// for tests 