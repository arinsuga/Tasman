update activity a, 
(
	select a.id, a.enduser_id, b.name,
	b.dept_id, c.name as enduser_dept_name,
	b.subdept_id, d.name as enduser_subdept_name
	from activity a
	left join employee b
	on a.enduser_id = b.id
	left join dept c
	on b.dept_id = c.id
	left join subdept d
	on b.subdept_id = d.id
) as b
set a.enduserdept_id = b.dept_id,
    a.endusersubdept_id = b.subdept_id
where a.id = b.id;
