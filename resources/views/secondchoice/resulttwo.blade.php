@extends('layouts.admin')

@section('content')
    {{-- TODO change this to componnent --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container">
        <section class="hk-sec-wrapper mt-100">
            <div class="pull-right hk-sec-title">

                <a href="{{ url('choicesecond') }}" class=" btn btn-dark mr-25"> back </a>
            </div>
            <h5 class="hk-sec-title">የተወዳዳሪዎች 2ኛ ምርጫ ከ ቡድን መሪ በላይ አጠቃላይ ውጤት </h5>
            <div class="row">
                <div class="col-sm">
                    <div class="table-wrap ">
                        <div class="table-responsive">
                            @role('hr')
                                <table id="datable_3" class="table table-hover table-bordered w-100  pb-30">
                                @endrole
                                @role('president')
                                    <table id="datable_1" class="table table-hover table-bordered w-100  pb-30">
                                    @endrole
                                    <thead>
                                        <tr>
                                            <th>ተ.ቁ</th>

                                            <th>ሙሉ ስም</th>
                                            {{-- @role('hr') --}}
                                            <th>ውጤት ሰጪ </th>

                                            <th>ለትምህርት ዝግጅት የሚሰጥ ነጥብ</th>
                                            <th>ለስራ ልምድ አገልግሎት የሚሰጥ ነጥብ</th>
                                            <th>ለውጤት ተኮር ምዘና</th>

                                            <th>ለፈተና ውጤት</th>
                                            {{-- @endrole --}}


                                            {{-- @role('president')
                                            <th>የሚወዳደሩበት የስራ መደብ</th>
                                            <th>የ ትምህርት ደረጃ</th>
                                            <th>የ ትምህርት ዝግጅት</th>
                                        @endrole --}}
                                            <th>አጠቃላይ ውጤት(65%)</th>
                                            @role('president')
                                                <th>presidential</th>
                                            @endrole

                                        </tr>
                                    </thead>

                                    @role('hr')
                                        <tbody>
                                            <?php
                                            $j = 0;
                                            ?>
                                            @foreach ($hrs as $i => $hr)
                                                @if ($hr->form->choice2->position_type_id == 1)
                                                    <tr>
                                                        <td>{{ ++$j }}</td>
                                                        <td>
                                                            <form action="" method="POST"><a
                                                                    href="{{ route('hr.show', $hr->form->id) }}" class="mr-25"
                                                                    data-toggle="tooltip"
                                                                    data-original-title="show">{{ $hr->form->full_name }} </a>
                                                            </form>
                                                        </td>
                                                        {{-- @role('hr') --}}
                                                        <td>{{ $hr->user->name }}</td>
                                                        <td>{{ $hr->performance }}</td>
                                                        <td>{{ $hr->experience }}</td>
                                                        <td>{{ $hr->resultbased }}</td>
                                                        <td>{{ $hr->exam }}</td>
                                                        {{-- @endrole --}}


                                                        <td>
                                                            {{ $hr->performance + $hr->experience + $hr->resultbased + $hr->exam }}

                                                        </td>





                                                        @role('president')
                                                            @if ($hr->status_hr == 1)
                                                                <td> <a class="btn  btn-dark " type="submit" id="btn-evaluate"
                                                                        href="{{ route('addpresident', $hr->id) }}">
                                                                        evaluate</a>
                                                                </td>
                                                            @endif
                                                        @endrole

                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    @endrole
                                    @role('president')
                                        <tbody>
                                            <?php
                                            $j = 0;
                                            ?>
                                            @foreach ($hrs as $i => $hr)
                                                @if ($hr->form->choice2->position_type_id == 1)
                                                    @if ($hr->status_hr == 1 && $hr->status_president == 0)
                                                        <tr>
                                                            <td>{{ ++$j }}</td>
                                                            <td>
                                                                <form action="" method="POST"><a
                                                                        href="{{ route('hr.show', $hr->form->id) }}"
                                                                        class="mr-25" data-toggle="tooltip"
                                                                        data-original-title="show">{{ $hr->form->full_name }}
                                                                    </a>
                                                                </form>
                                                            </td>
                                                            <td>{{ $hr->user->name }}</td>

                                                            {{-- <td>{{ $hr->form->position->position }}</td>
                                                        @foreach ($hr->form->education as $edu)
                                                            <td>{{ $edu->edu_level->education_level }}</td>
                                                            <td>{{ $edu->education_type->education_type }}</td>
                                                        @endforeach --}}
                                                            <td>{{ $hr->performance }}</td>
                                                            <td>{{ $hr->experience }}</td>
                                                            <td>{{ $hr->resultbased }}</td>
                                                            <td>{{ $hr->exam }}</td>
                                                            <td>
                                                                {{ $hr->performance + $hr->experience + $hr->resultbased + $hr->exam }}

                                                            </td>






                                                            <td> <a class="btn  btn-dark " type="submit" id="btn-evaluate"
                                                                    href="{{ route('addpresidenttwo', $hr->id) }}">
                                                                    evaluate</a>
                                                            </td>


                                                        </tr>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </tbody>
                                    @endrole
                                </table>
                        </div>



                    </div>
                </div>
            </div>

        </section>





    </div>
@endsection
