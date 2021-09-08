let instance = null;
export default class Request
{
    constructor(){
        if(!instance){
            instance = this;
        }
        this.xhrequest = new XMLHttpRequest();

        return instance;
    }

    getXhr(){
        return this.xhrequest;
    }

    addEventListener(eventStringId, callback){
        this.xhrequest.addEventListener(eventStringId, callback);
    }

    sendRequest(){
        this.xhrequest.send();
    }

    cancelrequest(){
        this.xhrequest.abort();
    }

}