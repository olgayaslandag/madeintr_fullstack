<label for="tag-input">Etiket</label>
<div class="tags-container">
    <input type="text" name="tag" id="tag-input" class="form-control" placeholder="Etiket ekleyin...">
    <div class="suggestions"></div>
</div>
<div class="selected-tags">
    @foreach (old('tags', $tags ?? []) as $tag)
        <span class="tag">
            <input type="hidden" name="tags[]" value="{{ $tag }}">
            {{ $tag }}
            <button type="button" class="remove-tag">&times;</button>
        </span>
    @endforeach
</div>







<style>
    .tags-container {
        position: relative;
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 100%;
    }
    .suggestions {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background-color: #fff;
        border-radius: 5px;
        z-index: 10;
        max-height: 150px;
        overflow-y: auto;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .suggestion {
        padding: 8px 10px;
        cursor: pointer;
    }
    .suggestion:hover {
        background-color: #f0f0f0;
    }
    .selected-tags {
        display: flex;
        flex-wrap: wrap;
        margin-top: 10px;
    }
    .tag {
        background-color: #9c9c9c;
        color: #FFF;
        border-radius: 5px;
        display: flex;
        align-items: center;
        font-size: 0.8rem;
        padding: 0 5px 0 15px;
        margin-right: 5px;
    }
    .tag span {
        margin-right: 5px;
    }
    .tag .remove {
        cursor: pointer;
        font-weight: bold;
    }
    .remove-tag {
        border: 0;
        background: transparent;
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        const $form = $('.tags-container');
        const $input = $('#tag-input');

        // Tag ekleme fonksiyonu
        function addTag(value) {
            const tagExists = $(`input[name="tags[]"][value="${value}"]`).length > 0;
            if (!tagExists) {

                const hiddenInput = $(`<input type="hidden" name="tags[]" value="${value}">`);
                const tagElement = $(`<span class="tag">${value}<button class="remove-tag">&times;</button></span>`);
                tagElement.append(hiddenInput);

                $(".selected-tags").append(tagElement);
            }
        }

        // Fake servis
        function fakeService(query) {
            return new Promise((resolve) => {
                setTimeout(() => {
                    const data = @json($item->tags ?? $tags ?? []);
                    const filtered = data.filter((item) => item.name.toLowerCase().includes(query.toLowerCase()));
                    resolve(filtered);
                }, 300);
            });
        }

        // Input alanına yazma
        $input.on("keyup", function (event) {
            const input = $(this);
            const value = input.val().trim();

            if (event.key === "Enter" || event.key === ",") {
                event.preventDefault(); // Form submit'i engelle
                addTag(value.replace(",", ""));
                input.val('');
                $(".suggestions").empty();
                return;
            }

            if (value) {
                fakeService(value).then((suggestions) => {
                    const suggestionBox = $(".suggestions");
                    suggestionBox.empty();
                    suggestions.forEach((item) => {
                        const suggestionItem = $(`<div class="suggestion">${item.name}</div>`);
                        suggestionItem.on("click", function () {
                            addTag(item.name);
                            input.val('');
                            $(".suggestions").empty();
                        });
                        suggestionBox.append(suggestionItem);
                    });
                });
            } else {
                $(".suggestions").empty();
            }
        });

        // Tag silme
        $(document).on("click", ".remove-tag", function () {
            $(this).closest(".tag").remove();
        });

        $input.on("keydown", function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
            }
        });
    });
</script>
