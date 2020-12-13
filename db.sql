create view v_pemeliharaan as 
SELECT pml.*,
    lk.Area, lk.Rayon, lk.Gardu_Induk, 
    sg.Penyulang1, sg.Penyulang2, sg.Status_Switch_Gear,
    kp.Nama_Keypoint_Dilokasi, kp.Nama_Keypoint_Discada,
    md.Id_Modem as idmodem, gt.Nama_Gatway, gt.Ip_Gatway, kp.GPS,
    kp.Alamat_Keypoint, kp.Jenis_Keypoint, md.Type_Modem,
    md.No_IMEI_SN, md.Ip_Modem,
    kp.Merk_RTU, kp.No_Seri_RTU,
    sc.Provider, sc.Ip_SIM, sc.No_SIM, sc.No_ICCID, 
    bt.Merk, bt.Kapasitas, bt.Jumlah, 
    gb.Gembok_Panel

FROM pemeliharaan pml
LEFT JOIN tb_keypoint kp ON pml.Id_Keypoint=kp.Id_Keypoint
LEFT JOIN baterai bt ON pml.Id_Baterai=bt.Id_Baterai
LEFT JOIN gatway gt ON pml.Id_Gatway=gt.Id_Gatway
LEFT JOIN switch_gear sg ON pml.Id_Status_Switch_Gear=sg.Id_Status_Switch_Gear
LEFT JOIN gembok gb ON pml.Id_Gembok=gb.Id_Gembok
LEFT JOIN lokasi lk ON pml.Id_Lokasi=lk.Id_Lokasi
LEFT JOIN sim_card sc ON pml.Id_SIM=sc.Id_SIM
LEFT JOIN modem md ON pml.Id=md.Id