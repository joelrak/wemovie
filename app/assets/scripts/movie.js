import Request from './request.class'


document.addEventListener("DOMContentLoaded",()=>{

    retrieveAndDisplayMovieDetail();
    searchMoviesByGenre();

});

retrieveAndDisplayMovieDetail = () => {
    document.querySelectorAll('.btn-read-more-movie').forEach(item => {
        item.addEventListener('click', event => {
            event.stopPropagation();
            let url = event.target.getAttribute('data-url-detail');
            sendXhrRequest('GET', url, displayModalFromXhr);
        });
    });
}

searchMoviesByGenre = () => {
    var searchQuery = localStorage.getItem('searchQuery');
    var genres = searchQuery.split();
    document.querySelectorAll('.check-movie-genre').forEach(item => {
        item.addEventListener('change', event => {
            event.stopPropagation();
            var index = genres.indexOf(event.target.value);
            if(this.checked){
                if(index == -1)
                    genres.push(event.target.valu);
            }else{
                if(index != -1)
                    delete genres[index];
            }
            localStorage.setItem('searchQuery', genres.join());
            let url = event.target.getAttribute('data-url');
            sendXhrRequest('GET', url, reloadMovieListSection);
        });
    });
}


sendXhrRequest = (method, url, callback) => 
{
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
    xhr.open(method, url);
    request.sendRequest();
}


displayModalFromXhr = (dataXhr) => {
    document.getElementById('movie-modal-title').innerHTML = dataXhr.title;
    document.getElementById('movie-modal-overview').innerHTML = dataXhr.overview;
    document.getElementById('movie-modal-release-date').innerHTML = dataXhr.release_date;
    var movieModal = document.getElementById('movieModalCenter');
    movieModal.show();
}

reloadMovieListSection = (dataXhr) => {
    var baseUrl     = dataXhr.base_url;
    var data        = dataXhr.data.results;
    var container   = document.getElementById("top_rated_movies");
    for(key in dataXhr.data.results)
    {
        var card = cardTemplate(baseUrl, data);
        container.appendChild(card);
    }
}

cardTemplate = (baseUrl, data) => {
    var card                    = document.createElement("div").setAttribute("class", "card movie-card bg-light");
    var cardBody                = document.createElement("div").setAttribute("class", "row card-body");
    var moviePosterContainer    = document.createElement("div").setAttribute("class", "col-md-4");
    var moviePosterImg          = document.createElement("img")
                                    .setAttribute("class", "poster-min")
                                    .setAttribute("src", baseUrl + data.poster_path)
                                    .setAttribute("alt", "minimal-size");
    var movieDetailContainer    = document.createElement("div").setAttribute("class", "col-md-8");
    var movieTitle              = document.createElement("h5").setAttribute("class", "card-title").innerHTML = data.title;
    var movieOverview           = document.createElement("h5").setAttribute("class", "card-title").innerHTML = data.overview;
    var buttonDetail            = document.createElement("span")
                                    .setAttribute("class", "btn btn-primary btn-read-more-movie pull-righte")
                                    .setAttribute("data-url-detail", "");
    movieDetailContainer.appendChild(movieTitle).appendChild(movieOverview).appendChild(buttonDetail);
    moviePosterContainer.appendChild(moviePosterImg);
    cardBody.appendChild(moviePosterContainer, movieDetailContainer);
    card.appendChild(cardBody);

    return card;
}
