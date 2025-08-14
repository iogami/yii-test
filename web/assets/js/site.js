$(document).ready(() => {
    const renderItems = (container, items, activeIndex = 0) => {
        container.empty();

        items.forEach((item, index) => {
            const $itemDiv = $('<div>')
                .attr('data-id', item.id)
                .text(item.title);

            if (index === activeIndex) {
                $itemDiv.addClass('active');
            }

            container.append($itemDiv);
        });
    };

    const loadSubthemeText = (subthemeId) => {
        $.ajax({
            url: `/data/subtheme-text?subtheme_id=${subthemeId}`,
            method: 'GET',
            dataType: 'json',
            success: (content) => {
                $('#subtheme-text').empty().text(content.text || content);
            },
            error: (error) => {
                console.error(`Error loading subtheme text ${subthemeId}:`, error);
            }
        });
    };

    const loadSubthemes = (themeId) => {
        $.ajax({
            url: `/data/subthemes-list?theme_id=${themeId}`,
            method: 'GET',
            dataType: 'json',
            success: (subthemes) => {
                renderItems($('#subthemes'), subthemes);

                if (subthemes.length > 0) {
                    loadSubthemeText(subthemes[0].id);
                }

                $('#subthemes div').on('click', function() {
                    const subthemeId = $(this).data('id');

                    $('#subthemes div').removeClass('active');
                    $(this).addClass('active');

                    loadSubthemeText(subthemeId);
                });
            },
            error: (error) => {
                console.error(`Error loading subthemes for theme ${themeId}:`, error);
            }
        });
    };

    const loadThemes = () => {
        $.ajax({
            url: '/data/themes-list',
            method: 'GET',
            dataType: 'json',
            success: (themes) => {
                renderItems($('#themes'), themes);

                if (themes.length > 0) {
                    loadSubthemes(themes[0].id);

                    $('#themes div').on('click', function() {
                        const themeId = $(this).data('id');

                        $('#themes div').removeClass('active');
                        $(this).addClass('active');

                        loadSubthemes(themeId);
                    });
                }
            },
            error: (error) => {
                console.error('Error loading themes:', error);
            }
        });
    };

    loadThemes();
});