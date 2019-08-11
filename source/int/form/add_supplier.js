(function() {
    "use strict"

    const addSupplierURL = (function() {
        const urlString = {
            add: `${BASE_URL}int/supplier/add`
        }
        return {
            getURL: () => urlString
        }
    })()


    const addSupplierUI = (function() {
        const domString = {
            form: {
                add: '#form__add__supplier'
            }
        }

        return {
            getDOM: () => domString
        }
    })()


    const addSupplierCTRL = (function(URL, UI) {


        const dom = UI.getDOM()
        const url = URL.getURL()
        
        const eventListener = function(){

            // $(dom.form.add).validate({
            //     rules: {
            //         nama_supplier: {
            //             required: true 
            //         },
            //         alamat: {
            //             required: true
            //         }

            //     },
            //     submitHandler: function(form){
            //         console.log('great');
            //     }
            // })

            $('#btn_simpan').on('click', function() {
                alert('cliked')
            })

            $(document).on(dom.form.add, 'submit', function(e) {
                e.preventDefault();
                alert('submitd')
            })

        }


        return {
            init: () => {
                console.log('add supplier init..')
                eventListener()
            }
        }
    })(addSupplierURL, addSupplierUI)

    addSupplierCTRL.init()


})()