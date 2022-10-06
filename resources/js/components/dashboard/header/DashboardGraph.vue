<template>
    <div>
        <LineChartGenerator
            :chart-options="chartOptions"
            :chart-data="graph_data"
            :chart-id="chartId"
            :dataset-id-key="datasetIdKey"
            :plugins="plugins"
            :css-classes="cssClasses"
            :styles="styles"
            :width="width"
            :height="height"
        />
    </div>


</template>

<script>
import {Line as LineChartGenerator} from "vue-chartjs";

import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    LineElement,
    LinearScale,
    CategoryScale,
    PointElement,
} from "chart.js";

ChartJS.register(
    Title,
    Tooltip,
    Legend,
    LineElement,
    LinearScale,
    CategoryScale,
    PointElement
);

export default {
    name: "DashboardGraph",

    components: {
        LineChartGenerator,
    },

    props: {
        graph_data: {
            type: Object,
            default: {},
        },

        chartId: {
            type: String,
            default: "line-chart",
        },

        datasetIdKey: {
            type: String,
            default: "label",
        },

        width: {
            type: Number,
            default: 400,
        },

        height: {
            type: Number,
            default: 400,
        },

        cssClasses: {
            default: "",
            type: String,
        },

        styles: {
            type: Object,
            default: () => {
            },
        },
        
        plugins: {
            type: Array,
            default: () => [],
        },
    },

    data() {
        return {
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false,
            },
        };
    },
};
</script>

<style>
</style>
