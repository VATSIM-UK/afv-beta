<div class="font-bold text-2xl mb-2 text-grey-darkest underline" id="issues">ISSUES</div>

<br />

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

<br />

<!-- Reporting Issues -->
<p class="text-black font-bold text-lg text-left italic" id="reportingIssues">
    Reporting Issues
</p>
<p class="text-grey-darker text-base text-left">
    For live support please contact us via the Discord link <a href="#welcome">at the top of this page</a>.<br />
    We also have a feedback form <a href="https://forms.gle/rQ4LChwn4EvSCLWZ9">Here</a> for you to report issues and post your thoughts on AFV.<br />
</p>
<!-- #END# Reporting Issues -->