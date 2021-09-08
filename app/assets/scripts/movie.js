import Request from './request.class'


document.addEventListener("DOMContentLoaded",function(){

    loadDataForAllElement('btn-read-more-movie', 'data-url-detail', 'click', displayModalFromXhr);
    loadDataForAllElement('check-movie-genre', 'data-url', 'change', reloadMovieListSection, {searchQuery: localStorage.getItem('searchQuery')});   

});

function loadDataForAllElement(elementClass, attributeContainUrl, eventName, callback, optionalParams={}){
    document.querySelectorAll('.' + elementClass).forEach(item => {
        item.addEventListener(eventName, event => {
            event.stopPropagation();
            let url = event.target.getAttribute(attributeContainUrl);
            var request = new Request();
            var xhr = request.getXhr();
            if(xhr.readyState !== 4){
                xhr.abort();
            }
            xhr.onreadystatechange = () => {
                if(xhr.readyState === 4){
                    callback(xhr.response);
                }
            }
            if(optionalParams.searchQuery != undefined){
                url = url + '&' + optionalParams.searchQuery.join();
                localStorage.setItem('searchQuery', event.target.value);
            }
            xhr.open('GET', url);
            request.sendRequest();
        });
    });
}

function displayModalFromXhr(dataXhr){
    document.getElementById('movie-modal-title').innerHTML = dataXhr.title;
    document.getElementById('movie-modal-overview').innerHTML = dataXhr.overview;
    document.getElementById('movie-modal-release-date').innerHTML = dataXhr.release_date;
    var movieModal = document.getElementById('movieModalCenter');
    movieModal.show();
}

function reloadMovieListSection(dataXhr)
{
    
}
