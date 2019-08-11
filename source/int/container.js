console.log('Container is running...');

const containerController = ((session) => {
    const DOM = {
        page: '#page'
    }

    const loadContent = (link) => {
        session.getUser(user => {
            let level   = user.level.toLowerCase();
            let path    = link.substr(2);

            if(path === 'dashboard'){
                path = `${path}/${level}`
            }

            $.ajaxSetup({
                beforeSend: function(){
                    $(DOM.page).html(`<center class="animated bounceOut"><img src="${BASE_URL}assets/images/loader.svg" style="height: 500px; margin-top: 50px" /></center>`)
                }
            })
            
            $.get(`${BASE_URL}intern/${path}`, function (html) {
                setTimeout(() => {
                    $(DOM.page).html(html);
                }, 1000)
            });
        })
    }

    const setRoute = () => {
        let link;

        if (!location.hash) {
            location.hash = '#/dashboard';
        } else {
            link = location.hash;
            loadContent(link);
        }

        $(window).on('hashchange', function () {
            link = location.hash;
            loadContent(link);
        });
    }

    return {
        init: () => {
            setRoute();
        }
    }
})(sessionController)

$(document).ready(function(){
    containerController.init();
})