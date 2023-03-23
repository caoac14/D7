@extends('admin.layout')

@section('division')
    <div>
        <div class="grid grid-cols-5 gap-4 p-4">
            @foreach ($listGroupRooms as $groupRoom)
                <div>
                    <span
                        class="text-center relative w-full inline-flex items-center justify-center p-0.5 mb-2 mr-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500  dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                        <span
                            class="relative w-full px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md ">
                            Dãy <span class="font-semibold">{{ $groupRoom->ten_day_phong }}</span>
                        </span>
                    </span>
                    <div>
                        <select name="division" id='division'
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg cursor-pointer focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($listDivisions as $division)
                                @if ($groupRoom->id == $division->ma_day)
                                    <option selected hidden> {{ $division->name }}</option>
                                @break

                            @else
                                <option selected hidden>--Chọn--</option>
                                @continue
                            @endif
                        @endforeach
                        @foreach ($listUsers as $user)
                            <option value="{{ $groupRoom->id }}-{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        @endforeach

    </div>
    <script type="text/javascript">
        var url = "{{ route('admin.updateDivision') }}";
        $("select[name='division']").change(function() {
            var dataRequest = $(this).val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    dataRequest: dataRequest,
                    _token: token
                },
                success: function(data) {
                    // alert("Thay đổi thành công")
                    console.log(data);
                }
            });
        });
    </script>
@endsection
