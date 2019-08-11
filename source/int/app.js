console.log('App is running...');

const renderApp = ((session) => {
    const DOM = {
        app: '#app'
    }

    return {
        init: () => {
            session.getUser(user => {
                let level = user.level.toLowerCase();

                if(level){
                    $(DOM.app).load(`${BASE_URL}intern/main/${level}`)
                } else {
                    $(DOM.app).html('Silau nyasar bosss.....')
                }
            })
        }
    }
})(sessionController)

$(document).ready(function(){
    renderApp.init();
})