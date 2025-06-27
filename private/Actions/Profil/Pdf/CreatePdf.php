<?php
require_once ($root . '/vendor/autoload.php');

use Mpdf\Mpdf;

function ExportUserToPDF($user_id) {
    try {
        $pdo = Connection();
        
        $query = "SELECT username, email, profile_photo_path, state, visibility, street, city, country, description, status FROM USERS WHERE id = :user_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$user) {
            throw new Exception("Utilisateur non trouvé");
        }
        
        $mpdf = new Mpdf();
        
        $html = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                h1 { color: #333; text-align: center; }
                .info { margin: 10px 0; }
                .label { font-weight: bold; display: inline-block; width: 150px; }
            </style>
        </head>
        <body>
            <h1>moodSocial - Profil Utilisateur</h1>
            
            <div class="info">
                <span class="label">Nom d\'utilisateur:</span> ' . htmlspecialchars($user['username'] ?? 'Non renseigné') . '
            </div>
            
            <div class="info">
                <span class="label">Email:</span> ' . htmlspecialchars($user['email'] ?? 'Non renseigné') . '
            </div>
            
            <div class="info">
                <span class="label">État:</span> ' . htmlspecialchars($user['state'] ?? 'Non renseigné') . '
            </div>
            
            <div class="info">
                <span class="label">Rue:</span> ' . htmlspecialchars($user['street'] ?? 'Non renseigné') . '
            </div>
            
            <div class="info">
                <span class="label">Ville:</span> ' . htmlspecialchars($user['city'] ?? 'Non renseigné') . '
            </div>
            
            <div class="info">
                <span class="label">Pays:</span> ' . htmlspecialchars($user['country'] ?? 'Non renseigné') . '
            </div>
            
            <div class="info">
                <span class="label">Visibilité:</span> ' . htmlspecialchars($user['visibility'] ?? 'Non renseigné') . '
            </div>
            
            <div class="info">
                <span class="label">Statut:</span> ' . htmlspecialchars($user['status'] ?? 'Non renseigné') . '
            </div>
            
            <div class="info">
                <span class="label">Photo de profil:</span> ' . htmlspecialchars($user['profile_photo_path'] ?? 'Non renseigné') . '
            </div>
            
            <div class="info">
                <span class="label">Description:</span><br>
                ' . nl2br(htmlspecialchars($user['description'] ?? 'Aucune description')) . '
            </div>
            
            <hr>
            <p style="text-align: center; font-size: 12px; color: #666;">
                Généré le ' . date('d/m/Y à H:i:s') . ' par moodSocial
            </p>
        </body>
        </html>';
        
        $mpdf->WriteHTML($html);
        
        $filename = 'profil_' . $user_id . '_' . date('Y-m-d') . '.pdf';
        $mpdf->Output($filename, 'D');
        
        return true;
        
    } catch (Exception $e) {
        error_log("Erreur PDF: " . $e->getMessage());
        return false;
    }
}

?>