<template>
<div class="container d-flex flex-column justify-content-between">
    <h1 class="display-6">Stock Predictor</h1>

    <line-chart v-if="loaded" :chartData="stockPredictorData"></line-chart>

    <form @submit.prevent="getData">
        <div class="row">
            <div class="col col-md-4">
                <label for="TickerSymbolInput">Ticker Symbol</label>
                <input v-model="tickerSymbol" class="form-control" type="text" name="TickerSymbolInput" placeholder="e.x MSFT" maxlength="5" required>
            </div>
            <div class="col col-md-4">
                <label for="DaysInput">Days</label>
                <input v-model="days" class="form-control" type="number" name="DaysInput" placeholder="10" min="1" max="30" required>
            </div>
            <div class="col col-md-4 d-flex align-items-end">
                <input class="btn btn-success" type="submit" value="Predict!">
            </div>
        </div>
    </form>

</div>
</template> 

<script>
    import LineChart from './LineChart'

    export default {
        components: {
            LineChart
        },
        data() {
            return {
                tickerSymbol: '',
                days: '',
                stockPredictorData: null,
                loaded: false
            }
        },
        methods: {
            getData() {
                axios.get('/api/stockpredictor', {
                    params: {
                        tickerSymbol: this.tickerSymbol,
                        days: this.days
                    }
                }).then((response) => {
                    $('#example').toast('show')
                    this.loaded = false
                    this.showChartJs(response)
                }).catch((error) => {
                    alert("The ticker symbol you entered is invalid, please use a NYSE ticker symbol.")
                })
            },
            showChartJs(response) {
                this.stockPredictorData = JSON.parse(response.data)
                this.loaded = true
            }
        },
        mounted() {
        }
    }
</script>

<style scoped>
.container {
    height: 70vh;
}
</style>
