    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Montserrat', sans-serif; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { opacity: 0; }
        .fade-up.visible { animation: fadeUp 0.7s ease forwards; }
        .delay-1 { animation-delay: 0.08s; }
        .delay-2 { animation-delay: 0.18s; }
        .delay-3 { animation-delay: 0.28s; }
        .delay-4 { animation-delay: 0.40s; }

        @keyframes marquee {
            from { transform: translateX(0); }
            to   { transform: translateX(-50%); }
        }
        .marquee-track { animation: marquee 22s linear infinite; display: flex; width: max-content; }

        @keyframes gradientShift {
            0%   { background-position: 0% 50%; }
            50%  { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .gradient-animated {
            background: linear-gradient(135deg, #85488F, #254292, #6b3fa0, #1a3580, #85488F);
            background-size: 300% 300%;
            animation: gradientShift 9s ease infinite;
        }

        .value-card { transition: width 0.55s cubic-bezier(0.4,0,0.2,1), box-shadow 0.3s ease; }
        .value-desc { max-height: 0; overflow: hidden; opacity: 0; transition: max-height 0.45s ease, opacity 0.35s ease; }
        .value-card:hover .value-desc { max-height: 150px; opacity: 1; }
        .value-card:hover { box-shadow: 0 28px 56px rgba(0,0,0,0.28); }

        .img-frame { position: relative; }
        .img-frame::before {
            content: '';
            position: absolute;
            inset: 0;
            border: 2px solid rgba(43,69,154,0.18);
            transform: translate(10px, 10px);
            transition: transform 0.5s ease;
            z-index: 0;
        }
        .img-frame:hover::before { transform: translate(14px, 14px); }
        .img-frame img { position: relative; z-index: 1; }

        .stat-card { transition: transform 0.3s ease; }
        .stat-card:hover { transform: translateY(-8px); }

        .vismis-card img { transition: transform 0.7s cubic-bezier(0.4,0,0.2,1); }
        .vismis-card:hover img { transform: scale(1.06); }
        .vismis-underline { width: 36px; height: 2px; background: rgba(255,255,255,0.3); border-radius: 2px; transition: width 0.4s ease; }
        .vismis-card:hover .vismis-underline { width: 68px; }

        @keyframes scrollDot {
            0%, 100% { opacity: 0.2; transform: translateY(0); }
            50%       { opacity: 0.7; transform: translateY(4px); }
        }
        .scroll-dot { animation: scrollDot 1.6s ease infinite; }
        .scroll-dot:nth-child(2) { animation-delay: 0.2s; }
        .scroll-dot:nth-child(3) { animation-delay: 0.4s; }

        /* ── Testimoni slider ── */
        .testi-slider { display: flex; transition: transform 0.45s cubic-bezier(0.4,0,0.2,1); }
        .testi-card { flex-shrink: 0; }

        /* ── Popup modal ── */
        .modal-backdrop {
            position: fixed; inset: 0;
            background: rgba(0,0,0,0.5);
            backdrop-filter: blur(3px);
            z-index: 9999;
            display: flex; align-items: center; justify-content: center;
            opacity: 0; pointer-events: none;
            transition: opacity 0.25s ease;
        }
        .modal-backdrop.open { opacity: 1; pointer-events: all; }
        .modal-box {
            background: #fff;
            border-radius: 12px;
            padding: 36px;
            width: 100%;
            max-width: 460px;
            transform: translateY(16px) scale(0.97);
            transition: transform 0.3s cubic-bezier(0.4,0,0.2,1);
        }
        .modal-backdrop.open .modal-box { transform: translateY(0) scale(1); }

        /* ── Star rating ── */
        .star-input { display: flex; flex-direction: row-reverse; justify-content: flex-end; gap: 4px; }
        .star-input input { display: none; }
        .star-input label {
            font-size: 28px; color: #d1d5db; cursor: pointer;
            transition: color 0.15s ease;
        }
        .star-input label:hover,
        .star-input label:hover ~ label,
        .star-input input:checked ~ label { color: #f59e0b; }

        /* ── Toast notif ── */
        @keyframes toastIn {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes toastOut {
            from { opacity: 1; transform: translateY(0); }
            to   { opacity: 0; transform: translateY(16px); }
        }
        .toast {
            position: fixed; bottom: 28px; right: 28px; z-index: 99999;
            background: #1a1a2e; color: #fff;
            padding: 14px 20px; border-radius: 10px;
            font-size: 13px; font-weight: 600;
            display: flex; align-items: center; gap: 10px;
            animation: toastIn 0.35s ease forwards;
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        }
        .toast.hide { animation: toastOut 0.35s ease forwards; }
        .toast-icon { width: 20px; height: 20px; background: #22c55e; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    </style>
        {{-- ═══════════════════════ MARQUEE ═══════════════════════ --}}
        <div class="overflow-hidden border-y border-gray-100 bg-gray-50 py-3.5">
            <div class="marquee-track">
                @php $words = ['Ketepatan','Disiplin','Keunggulan','Sunnah','Prestasi','Komunitas','Fokus','Dedikasi']; @endphp
                @foreach(array_merge($words,$words) as $word)
                <span class="flex items-center gap-5 mr-10 text-[10px] font-bold uppercase tracking-[4px] text-gray-400">
                    {{ $word }}<span class="w-1 h-1 rounded-full bg-[#2b459a] opacity-40 inline-block shrink-0"></span>
                </span>
                @endforeach
            </div>
        </div>