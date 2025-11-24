<x-guest-layout>
    <livewire:facilities.index />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('[id^="hospital-card"]');

            cards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.classList.add('animate-fade-in-up');
            });

            const buttons = document.querySelectorAll('button[class*="bg-gradient"]');
            buttons.forEach(button => {
                if (!button.disabled && !button.classList.contains('cursor-not-allowed')) {
                    button.addEventListener('click', function() {
                        const hospitalName = this.closest('[id^="hospital-card"]').querySelector(
                            'h3').textContent;
                        console.log(`Navigating to ${hospitalName}`);
                    });
                }
            });
        });
    </script>

    <style>
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.6s ease-out forwards;
        }
    </style>
</x-guest-layout>
