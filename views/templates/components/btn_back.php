<?php
function btnBack(string $href): void { ?>
    <a href="<?= $href ?>">
        <button type="button"
            class="text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-full p-2 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="m10 18l-6-6l6-6l1.4 1.45L7.85 11H20v2H7.85l3.55 3.55z" />
            </svg>
        </button>
    </a>
<?php }