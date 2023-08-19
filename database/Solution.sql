
-------1--------

SELECT p.pr_id,p.pr_judul,p.pr_tglpengajuan,kep_nama,p.pr_KlasifikasiKep from protokol_peneliti pp,protokol p,multicenter m,kep k where pp.p_id=7 and p.pr_id=pp.pr_id and p.pr_id=m.pr_id and m.kep_id=k.kep_id and (p.pr_KlasifikasiKep!='E1');




SELECT pro.pr_id,pro.pr_judul,pro.pr_tglpengajuan, mul.kep_nama,pro.pr_KlasifikasiKep from (select k.kep_nama,m.pr_id from multicenter m join kep k on k.kep_id=m.kep_id) as mul join
(select p.pr_id,p.pr_judul,p.pr_tglpengajuan, p.pr_KlasifikasiKep from protokol p join
 (SELECT pr_id from protokol_peneliti where p_id=7) as pp on pp.pr_id=p.pr_id) as pro on pro.pr_id=mul.pr_id;



CREATE INDEX protokolpenelitiidx on protokol_peneliti(pr_id,p_id);
CREATE index protokolidx on protokol(pr_id,pr_judul,pr_klasifikasikep);
CREATE index multicenteridx on multicenter(kep_id,pr_id);
CREATE index kepidx on kep(kep_id,kep_nama);
CLUSTER protokol_peneliti using protokolpenelitiidx;
CLUSTER kep using kepidx;
CLUSTER multicenter using multicenteridx;
CLUSTER  protokol using protokolidx;
------2--------
SELECT k.kep_nama,k.kep_instansi, count(a.ag_id) from kep k ​
join sk_kep sk on k.kep_id=sk.kep_id ​
join member_kep m on sk.sk_id=m.sk_id ​
join anggota a on a.ag_id=m.ag_id group by k.kep_nama,k.kep_instansi;​

SELECT k.kep_nama,k.kep_instansi, count(a.ag_id) from kep k ,sk_kep sk,member_kep m,anggota a WHERE k.kep_id=sk.kep_id and  sk.sk_id=m.sk_id and a.ag_id = m.ag_id group by k.kep_nama, k.kep_instansi;
SELECT k.kep_nama,k.kep_instansi, count(a.ag_id) from kep k join sk_kep sk on k.kep_id=sk.kep_id join member_kep m on sk.sk_id=m.sk_id join anggota a on a.ag_id=m.ag_id group by k.kep_nama,k.kep_instansi;
-------3--------
CREATE index kepidx2 on kep(kep_id,kep_nama,kep_instansi);
CREATE index skkepidx on sk_kep(sk_id,kep_id);
CREATE index memberkepidx on member_kep(sk_id,ag_id);


cluster kep using kepidx2;
cluster sk_kep using  skkepidx;
Cluster member_kep using memberkepidx;