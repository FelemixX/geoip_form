export class Geoipform {
    constructor() {
        this.form = BX('geoip-form');
        this.input = BX('geoip-form-input');
        this.ipRegexp = '^((25[0-5]|(2[0-4]|1\\d|[1-9]|)\\d)\\.?\\b){4}$'
        this.warnMessage = this.form.querySelector('div.warn-message');
        this.initHandlers();
    }

    initHandlers() {
        BX.bind(this.form, 'submit', BX.proxy(this.processFormSubmit, this));
    }


    processFormSubmit(event) {
        event.preventDefault();
        const inputValue = this.input.value;

        if (!inputValue.match(this.ipRegexp)) {
            BX.removeClass(this.warnMessage, 'd-none');
        } else {
            BX.addClass(this.warnMessage, 'd-none');
            this.sendRequest(inputValue);
        }
    }

    sendRequest(userIp) {
        BX.ajax.runComponentAction(
            'felemixx.common:geoip.form',
            'processFormData',
            {
                mode: 'class',
                data: {
                    userIp: userIp,
                },

            }
        ).then(res => {
            if (res.data.success) {
                this.onSuccess(res.data.html);
            } else {
                this.onFail();
            }
        }).catch(console.error);
    }

    onSuccess(data) {
        console.log(data);
    }

    onFail() {
        BX.removeClass(this.warnMessage, 'd-none');
    }
}
