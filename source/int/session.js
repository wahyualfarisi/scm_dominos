console.log('Session is running...');

const sessionController = (() => {
    return {
        getUser: (callback) => {
            if (TOKEN) {
                $.ajax({
                    url: `${BASE_URL}int/setting/user_info`,
                    type: 'GET',
                    dataType: 'JSON',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader("Authorization", "Basic " + btoa(USERNAME + ":" + PASSWORD))
                        xhr.setRequestHeader("SCM-INT-KEY", TOKEN)
                    },
                    success: function (res){
                        callback(res.data);
                    },
                    error: function (err) {
                        window.location.replace(`${BASE_URL}private`)
                    }
                });

            } else {
                window.location.replace(`${BASE_URL}private`)
            }
        }
    }
})();


