<div class="font-bold text-2xl mb-2 text-grey-darkest underline" id="issues">ISSUES</div>

<!-- Reporting Issues -->
<p>
  <ul class="text-grey-darker text-base text-left">
    <li>For issues requiring immediate support, join us on Discord (link in the <i>HOME</i> section).</li>
    <li>For bug reporting and issues which do not require live support fill <i><a href="https://forms.gle/rQ4LChwn4EvSCLWZ9" class="text-grey-darker underline">THIS FORM</a></i> in.
    If there was any popup with error details, please copy-paste them in the 'details' field.</li>
  </ul>
</p>
<!-- #END# Reporting Issues -->

<br/>

<!-- Known Issues -->
<div class="card">
  <div class="card-header text-black font-bold text-lg text-left italic">
    Known Issues
  </div>
</div>

@if (!count($issues['issues']))
<div class="card">
  <div class="card-body text-green text-base text-left">
    <h6 class="card-title font-bold">None</h6>
    <p class="card-text">We have somehow managed to solve all that was wrong. Hip Hip Hooray!</p>
  </div>
</div>
@else
    @foreach ($issues['issues'] as $issue)
        @if ($issue['open'])
        <div class="card">
          <div class="card-body text-grey-darker text-base text-left">
            <h6 class="card-title font-bold">
              <u>{{ $issue['title'] }}</u>
            </h6>
            <p class="card-text">
              {!! $issue['body'] !!}
            </p>
          </div>
        </div>
        @endif
    @endforeach
@endif
<!-- #END# Known Issues -->

<br />


<!-- Knowledge Base -->
@if (count($issues['knowledge_base']))
<div class="card">
  <div class="card-header text-black font-bold text-lg text-left italic">
    Knowledge Base
  </div>
</div>
@foreach ($issues['knowledge_base'] as $issue)
    @if ($issue['open'])
    <div class="card">
      <div class="card-body text-grey-darker text-base text-left">
        <h6 class="card-title font-bold">
          <u>{{ $issue['title'] }}</u>
        </h6>
        <p class="card-text">
          {!! $issue['body'] !!}
        </p>
      </div>
    </div>
    @endif
@endforeach
@endif
<!-- #END# Known Issues -->