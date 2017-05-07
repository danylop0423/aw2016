var auctionTimerComponent = Vue.extend({
     template: `
        <p class="time-left">{{ remainingTime }}</p>
    `,

    ready: function() {
        this.endTime = new Date(this.endTime);
        this.endTime = {
            hour: this.endTime.getHours() == 0 ? 24 : this.endTime.getHours(),
            minutes: this.endTime.getMinutes() == 0 ? 59 : this.endTime.getMinutes() - 1,
            day: this.endTime.getDay(),
            month: this.endTime.getMonth(),
            date: this.endTime
        }
        this.updateTime();
    },

    data: function() {
        return { remainingTime: '' };
    },

    props: [ 'endTime' ],

    methods: {
        updateTime: function () {
            var self = this;
            var today = new Date();
            var seconds = Math.floor((this.endTime.date - today) / 1000);
            var remaining = [
                Math.floor(seconds / 3600),
                ('0' + (this.endTime.minutes - today.getMinutes())).slice(-2),
                ('0' + (59 - today.getSeconds())).slice(-2)
            ];

            this.remainingTime = remaining.join(':');

            setTimeout(function() { self.updateTime() }, 500);
        }
    }
});

Vue.component('auction-timer', auctionTimerComponent);