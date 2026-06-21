const fs = require('fs');

function replaceClasses(file) {
    let content = fs.readFileSync(file, 'utf8');
    content = content
        .replace(/bg-base-200/g, 'bg-[var(--mc-bg)]')
        .replace(/bg-base-100/g, 'bg-[var(--mc-surface)]')
        .replace(/bg-base-300/g, 'bg-[var(--mc-surface-hover)]')
        .replace(/border-base-300/g, 'border-[var(--mc-border-teal-sub)]')
        .replace(/text-base-content\/50/g, 'text-[var(--mc-text-muted)]')
        .replace(/text-base-content\/60/g, 'text-[var(--mc-text-faint)]')
        .replace(/text-base-content\/70/g, 'text-[var(--mc-text-sub)]')
        .replace(/text-base-content/g, 'text-[var(--mc-text)]');
    fs.writeFileSync(file, content);
}

replaceClasses('resources/views/dashboard/mentor_dashboard.blade.php');
replaceClasses('resources/views/dashboard/student_dashboard.blade.php');
console.log('Done!');
