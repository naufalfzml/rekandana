<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Proposal Diperbarui</title>
</head>
<body style="margin: 0; padding: 0; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; background-color: #f3f4f6; line-height: 1.6;">
    <div style="max-width: 600px; margin: 32px auto; background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden;">
        <!-- Header -->
        @if($status === 'disetujui')
        <div style="background: linear-gradient(135deg, #10b981 0%, #059669 100%); color: #ffffff; padding: 32px 24px; text-align: center;">
            <h1 style="margin: 0; font-size: 24px; font-weight: 700;">🎉 Selamat! Proposal Anda Disetujui</h1>
        </div>
        @else
        <div style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%); color: #ffffff; padding: 32px 24px; text-align: center;">
            <h1 style="margin: 0; font-size: 24px; font-weight: 700;">📋 Status Proposal Diperbarui</h1>
        </div>
        @endif

        <!-- Content -->
        <div style="padding: 32px 24px; color: #1f2937;">
            <p style="margin-top: 0; margin-bottom: 16px;">Halo, <strong style="font-weight: 600;">{{ $mahasiswa->name }}</strong>!</p>

            @if($status === 'disetujui')
            <p style="margin-bottom: 16px; font-size: 16px;">Kabar gembira! 🎊 Proposal Anda telah <strong style="color: #059669;">disetujui</strong> oleh tim admin kami.</p>
            @else
            <p style="margin-bottom: 16px; font-size: 16px;">Kami informasikan bahwa proposal Anda telah <strong style="color: #dc2626;">ditolak</strong> setelah melalui proses review.</p>
            @endif

            <!-- Proposal Info -->
            <div style="background-color: #f9fafb; border-left: 4px solid {{ $status === 'disetujui' ? '#10b981' : '#ef4444' }}; border-radius: 8px; padding: 16px; margin: 24px 0;">
                <h3 style="margin: 0 0 12px 0; font-size: 16px; font-weight: 600; color: {{ $status === 'disetujui' ? '#059669' : '#dc2626' }};">📄 Detail Proposal</h3>
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Judul:</strong> {{ $proposalTitle }}</p>
                <p style="margin: 4px 0;"><strong style="font-weight: 600;">Status:</strong>
                    <span style="display: inline-block; padding: 4px 12px; border-radius: 999px; font-size: 14px; font-weight: 600; {{ $status === 'disetujui' ? 'background-color: #d1fae5; color: #065f46;' : 'background-color: #fee2e2; color: #991b1b;' }}">
                        {{ ucfirst($status) }}
                    </span>
                </p>
            </div>

            @if($status === 'disetujui')
            <!-- Success Message -->
            <div style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); border-left: 4px solid #10b981; border-radius: 8px; padding: 16px; margin: 24px 0;">
                <h3 style="margin: 0 0 12px 0; font-size: 16px; font-weight: 600; color: #065f46;">✅ Langkah Selanjutnya</h3>
                <ul style="margin: 8px 0; padding-left: 20px; color: #047857;">
                    <li style="margin: 4px 0;">Proposal Anda sekarang terlihat oleh semua sponsor di platform</li>
                    <li style="margin: 4px 0;">Sponsor dapat melihat detail dan menghubungi Anda</li>
                    <li style="margin: 4px 0;">Anda akan menerima notifikasi jika ada sponsor yang tertarik</li>
                    <li style="margin: 4px 0;">Pantau dashboard Anda secara berkala untuk update terbaru</li>
                </ul>
            </div>

            <p style="margin-bottom: 24px;">Sekarang saatnya menunggu sponsor yang tertarik dengan proposal Anda. Pastikan Anda selalu memeriksa email dan dashboard untuk update terbaru.</p>
            @else
            <!-- Rejection Message -->
            <div style="background-color: #fef3c7; border-left: 4px solid #f59e0b; border-radius: 8px; padding: 16px; margin: 24px 0;">
                <h3 style="margin: 0 0 12px 0; font-size: 16px; font-weight: 600; color: #d97706;">💡 Saran untuk Anda</h3>
                <ul style="margin: 8px 0; padding-left: 20px; color: #92400e;">
                    <li style="margin: 4px 0;">Tinjau kembali proposal Anda dan pastikan semua informasi lengkap</li>
                    <li style="margin: 4px 0;">Periksa kesesuaian kategori dan bidang proposal</li>
                    <li style="margin: 4px 0;">Pastikan target pendanaan realistis dan terperinci</li>
                    <li style="margin: 4px 0;">Anda dapat mengajukan proposal baru setelah melakukan perbaikan</li>
                </ul>
            </div>

            <p style="margin-bottom: 24px;">Jangan berkecil hati! Ini adalah kesempatan untuk memperbaiki dan menyempurnakan proposal Anda. Tim kami siap membantu jika Anda memiliki pertanyaan.</p>
            @endif

            <!-- CTA Button -->
            <div style="text-align: center; margin: 32px 0;">
                <a href="{{ url('/dashboard') }}" style="display: inline-block; padding: 14px 28px; background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%); color: #ffffff; font-weight: 600; text-decoration: none; border-radius: 8px; box-shadow: 0 4px 6px rgba(79, 70, 229, 0.3);">
                    🏠 Lihat Dashboard
                </a>
            </div>

            <p style="margin-top: 32px; margin-bottom: 4px;">Terima kasih telah menggunakan platform kami!</p>
            <p style="margin: 0;">
                <strong style="font-weight: 600;">Tim Rekandana</strong><br>
                <span style="color: #6b7280; font-size: 14px;">Platform Kolaborasi Mahasiswa & Sponsor</span>
            </p>
        </div>

        <!-- Footer -->
        <div style="background-color: #f9fafb; border-top: 1px solid #e5e7eb; padding: 20px 24px; text-align: center;">
            <p style="margin: 0 0 4px 0; font-size: 12px; color: #6b7280;">Email ini dikirim secara otomatis dari sistem Rekandana.</p>
            <p style="margin: 0; font-size: 12px; color: #9ca3af;">&copy; {{ date('Y') }} Rekandana. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
