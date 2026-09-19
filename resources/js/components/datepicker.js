import i18next from 'i18next';
export default () => {
    return {
        showDatepicker: false,
        datepickerValue: '',
        month: '',
        year: '',
        no_of_days: [],
        blankdays: [],
        get days() { return [i18next.t('Sun'), i18next.t('Mon'), i18next.t('Tue'), i18next.t('Wed'), i18next.t('Thu'), i18next.t('Fri'), i18next.t('Sat')]; },
        get MONTH_NAMES() { return [i18next.t('January'), i18next.t('February'), i18next.t('March'), i18next.t('April'), i18next.t('May'), i18next.t('June'), i18next.t('July'), i18next.t('August'), i18next.t('September'), i18next.t('October'), i18next.t('November'), i18next.t('December')]; },

        initDate(val = null) {
            let today = val ? new Date(val) : new Date();
            this.month = today.getMonth();
            this.year = today.getFullYear();
            this.datepickerValue = new Date(this.year, this.month, today.getDate()).toDateString();
        },

        isSelectedDate(date) {
            const d = new Date(this.year, this.month, date);
            return this.datepickerValue === d.toDateString() ? true : false;
        },

        isToday(date) {
            const today = new Date();
            const d = new Date(this.year, this.month, date);
            return today.toDateString() === d.toDateString() ? true : false;
        },

        getDateValue(date) {
            let selectedDate = new Date(this.year, this.month, date);
            this.datepickerValue = selectedDate.toDateString();
            this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + (selectedDate.getMonth() + 1)).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);
            this.showDatepicker = false;
        },

        getNoOfDays() {
            let daysInMonth = new Date(this.year, this.month + 1, 0).getDate();
            // find where to start calendar day of week
            let dayOfWeek = new Date(this.year, this.month).getDay();
            let blankdaysArray = [];
            for (var i = 1; i <= dayOfWeek; i++) {
                blankdaysArray.push(i);
            }
            let daysArray = [];
            for (var i = 1; i <= daysInMonth; i++) {
                daysArray.push(i);
            }
            this.blankdays = blankdaysArray;
            this.no_of_days = daysArray;
        }
    }
}
