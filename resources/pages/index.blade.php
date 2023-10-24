@component('html')
  <header>
    <h1>rarchive</h1>
  </header>

  <form action="{{ route('index') }}" method="GET">
    <table class="search">
      <thead>
        <tr>
          <th><label for="title">Title (Comma Separated Terms)</label></th>
          <th><label for="imdb">IMDB</label></th>
          <th><label for="category">Category</label></th>
          <th><label for="include_xxx">Include XXX</label></th>
          <th></th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td class="search-title">
            <input
              type="text"
              name="title"
              id="title"
              value="{{ $queryTitle ?? '' }}"
            >
          </td>

          <td >
            <input
              type="text"
              name="imdb"
              id="imdb"
              value="{{ $queryImdb ?? '' }}"
            >
          </td>

          <td>
            <select name="category" id="category">
              <option value="">All</option>

              @foreach($categories as $category)
                <option
                  value="{{ $category }}"
                  @if($category === $queryCategory)
                    selected
                  @endif
                >
                  {{ $category }}
                </option>
              @endforeach
            </select>
          </td>

          <td>
            <input
              type="checkbox"
              name="include_xxx"
              id="include_xxx"
              @if($queryIncludeXxx)
                checked
              @endif
              value="1"
            >
          </td>

          <td>
            <button type="submit">Search</button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>

  <table class="results">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Added</th>
        <th>Category</th>
        <th>Size</th>
        <th>IMDB</th>
        <th>Magnet</th>
      </tr>
    </thead>

    <tbody>
      @forelse($items as $item)
        <tr>
          <td>{{ $item->id }}</td>

          <td>{{ $item->title }}</td>

          <td>{{ $item->dt }}</td>

          <td>{{ $item->cat }}</td>

          <td>{{ $item->size }}</td>

          <td>
            @if ($item->imdb)
              <a
                href="https://www.imdb.com/title/{{ $item->imdb }}"
                target="_blank"
              >
                {{ $item->imdb }}
              </a>
            @endif
          </td>

          <td>
            <a href="{{ sprintf("magnet:?xt=urn:btih:%s", $item->hash) }}">
              Magnet
            </a>
        </tr>
      @empty
        <tr>
          <td colspan="99">No items found.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  <nav class="pagination">
    @if ($items->onFirstPage())
      <span>&lt; Previous</span>
    @else
      <a href="{{ $items->previousPageUrl() }}">
        &lt; Previous
      </a>
    @endif

    <p>{{ number_format($items->lastPage()) }} {{ Str::plural('page', $items->lastPage()) }}</p>

    @if ($items->onLastPage())
      <span>Next &gt;</span>
    @else
      <a href="{{ $items->nextPageUrl() }}">
        Next &gt;
      </a>
    @endif
  </nav>

  <footer>
    Enjoy!
  </footer>
@endcomponent
