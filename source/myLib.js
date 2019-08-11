var myLibraryJS = (function() {


    return {
        postResource: (url, form, dom, resSuccess, resError, domComplete) => {
            $.ajax({
                url,
                type: 'POST',
                data: $(form).serialize(),
                beforeSend: function(xhr){
                    xhr.setRequestHeader("Authorization", "Basic " + btoa(USERNAME + ":" + PASSWORD))
                    xhr.setRequestHeader("SCM-INT-KEY", TOKEN)
                    $(dom).attr('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>')
                },
                success: function(res){
                    resSuccess(res)
                },
                error: function(error){
                    resError(error)
                },
                complete: function(){
                    $(dom).attr('disabled', false).text(domComplete);
                }
        
            })
        },
        putResource: (url, form, dom, resSuccess, resError, domComplete) => {
            $.ajax({
                url,
                type: 'PUT',
                data: $(form).serialize(),
                beforeSend: function(xhr){
                    xhr.setRequestHeader("Authorization", "Basic " + btoa(USERNAME + ":" + PASSWORD))
                    xhr.setRequestHeader("SCM-INT-KEY", TOKEN)
                    $(dom).attr('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>')
                },
                success: function(res){
                    resSuccess(res)
                },
                error: function(error){
                    resError(error)
                },
                complete: function(){
                    $(dom).attr('disabled', false).text(domComplete);
                }
        
            })
        },
        freeCall: (url, form, dom, resSuccess, resError, domComplete) => {
            $.ajax({
                url,
                type: 'POST',
                data: $(form).serialize(),
                beforeSend: function(xhr){
                    $(dom).attr('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>')
                },
                success: function(res){
                    resSuccess(res)
                },
                error: function(error){
                    resError(error)
                },
                complete: function(){
                    $(dom).attr('disabled', false).text(domComplete);
                }
            })
        },
        getResource: (url, resSuccess, resError) => {
            $.ajax({
                url, 
                type: 'GET',
                dataType: 'JSON',
                beforeSend: function(xhr){
                    xhr.setRequestHeader("Authorization", "Basic " + btoa(USERNAME + ":" + PASSWORD))
                    xhr.setRequestHeader("SCM-INT-KEY", TOKEN)
                },
                success: function(res){
                    resSuccess(res)
                },
                error: function(error){
                    resError(error)
                }    
            })
        },
        clearConsole: () => {
            if(window.console){
                console.clear()
            }
        },
        testing: () => {
            console.log('testing working...')
        }
    }

})();