<div class="test">
    <div class="header-title">
        <h1>
            {{ $employee->last_name }}-{{ $employee->first_name }}
        </h1>
    </div>

    <div>
        <div class="pdf-title">
            <h1>
                Výpis práce
            </h1>

            <h3>
            </h3>
        </div>

        <table>
            <thead>
                <tr class="text-center">
                    <th>Datum</th>
                    <th>Misto</th>
                    <th>Prace</th>

                    <th>Hodiny</th>
                    <th>kc / h</th>
                    <th>Vydelek</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($works_for_month as $work)
                    <tr>
                        <td>
                            {{ $work->date }}
                        </td>


                        <td>
                            {{ $work->project_name }}
                        </td>


                        <td>
                            {{ $work->job }}
                        </td>


                        <td>
                            {{ $work->hours }}
                        </td>


                        <td>
                            {{ $work->money_per_hour }}
                        </td>


                        <td>
                            {{ $work->hours * $work->money_per_hour }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="result-price">
            <h1>
                {{ $last_month_earns }} ,-
            </h1>
        </div>

    </div>
</div>


<style>
    .test .header-title {
        background-color: black;
        border-radius: 5px;
    }
    
    .test .header-title h1 {
        text-align: center;
        letter-spacing: 5px;
        text-transform: uppercase;
        font-weight: bolder;
        font-size: 15px;
        padding: 15px;
        color: white;
    }
    
    .test .employee-title {
        display: flex;
        flex-flow: row;
    
    }
    
    .test .employee-title h1 {
        font-size: 20px;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-weight: bolder;
    }
    
    .test .employee-title h2 {
        font-size: 15px;
        text-transform: uppercase;
        font-weight: bolder;
        margin-left: 15px;
        color: gray;
    }
    
    .test table {
        border: solid 1px black
    }
    
    .test table thead {
        background-color: black;
        padding: 5px;
    }
    
    .test table thead tr th {
        color: white;
        border-right: solid 2px white;
        width: 100px;
    }
    
    .test table tbody tr td {
        text-align: center;
        padding-bottom: 10px;
        border-right: solid 2px black;
    }
    
    .test .pdf-title {
        text-align: center;
        margin: 0;
        padding: 0;
    }
    
    .test .pdf-title h1 {
        text-transform: uppercase;
        letter-spacing: 2px;
    }
    
    .test .result-price {
        text-align: center;
        text-transform: uppercase;
        position: relative;
        top: 50px;
        background-color: black;
        padding: 5px;
        width: 18%;
        margin: auto;
        border-radius: 25px;    
    }
    
    .test .result-price h1 {
        color: greenyellow;
        border-bottom: double 5px white ;
        width: 50%;
        margin: auto;
    }
    
    .test .result-price h1 span {
        letter-spacing: 5px;
        border-bottom: double 2px black;
    
    }
    </style>



{{-- <template>
    <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">

                </div>

                <div class="modal-footer">

                    <button @click="downloadEmployeePdf" type="button" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-download" viewBox="0 0 16 16">
                            <path
                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z">
                            </path>
                            <path
                                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z">
                            </path>
                        </svg>
                    </button>

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</template> --}}
