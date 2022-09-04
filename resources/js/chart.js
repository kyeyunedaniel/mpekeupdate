import { Line } from 'vue-chartjs'

export default {
    extends: Line,
    mounted() {
        this.renderChart(data, options)
    }
}