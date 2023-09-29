<li class="side a-collapse short m-2 pr-1 pl-1 ">
    <a style="    color: #6c757d;" href="{{ route('client.home') }}" class="side-item  {{'client/home' == request()->path() ? 'selected' : ''}} "><i class="fas fa-tachometer-alt mr-1"></i>لوحة القيادة</a>
</li>
<li class="side a-collapse short m-2 pr-1 pl-1 ">
    <a style="    color: #6c757d;" href="{{ route('importations.client.index') }}" class="side-item {{'client/importations/create' == request()->path() ? 'selected' : ''}} {{'client/importations' == request()->path() ? 'selected' : ''}}"><i class="fas fa-language  mr-1"></i> {{ trans('importations.model_plural') }}</a>
</li>

<li class="side a-collapse short m-2 pr-1 pl-1 ">
    <a  style="    color: #6c757d;"  href="{{ route('importations.after.client.index') }}" class="side-item {{'client/importationsafter/create' == request()->path() ? 'selected' : ''}} {{'client/importationsafter' == request()->path() ? 'selected' : ''}}"><i class="fas fa-language  mr-1"></i> {{ trans('importations.after') }}</a>
</li>
<li class="side a-collapse short m-2 pr-1 pl-1 ">
    <a style="    color: #6c757d;"  href="{{ route('exports.client.index') }}" class="side-item  {{'client/exports' == request()->path() ? 'selected' : ''}} {{'client/exports/create' == request()->path() ? 'selected' : ''}}"><i class="fas fa-language  mr-1"></i> {{ trans('exports.model_plural') }}</a>
</li>


<li class="side a-collapse short m-2 pr-1 pl-1 ">
    <a style="    color: #6c757d;"  href="{{ route('exports.after.client.index') }}" class="side-item  {{'client/exportsafter' == request()->path() ? 'selected' : ''}} {{'client/exportsafter/create' == request()->path() ? 'selected' : ''}}"><i class="fas fa-language  mr-1"></i> {{ trans('exports.after') }}</a>
</li>
